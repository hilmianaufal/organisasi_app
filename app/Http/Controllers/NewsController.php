<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    private function uploadPath(string $folder): string
    {
        if (app()->environment('local')) {
            return public_path('uploads/' . $folder);
        }

        return $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $folder;
    }

    public function index()
    {
        $news = News::with('category')->latest()->get();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::latest()->get();

        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt' => 'nullable',
            'content' => 'required',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $uploadPath = $this->uploadPath('news');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $imagePath = 'uploads/news/' . $imageName;
        }

        News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(News $news)
    {
        $categories = Category::latest()->get();

        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'excerpt' => 'nullable',
            'content' => 'required',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = $news->image;

        if ($request->hasFile('image')) {
            $uploadPath = $this->uploadPath('news');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            if ($news->image) {
                $oldImage = $_SERVER['DOCUMENT_ROOT'] . '/' . $news->image;

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $imagePath = 'uploads/news/' . $imageName;
        }

        $news->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            $imagePath = app()->environment('local')
                ? public_path($news->image)
                : $_SERVER['DOCUMENT_ROOT'] . '/' . $news->image;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function publicIndex()
    {
        $news = News::with('category')->latest()->get();
        $categories = Category::withCount('news')->latest()->get();

        return view('pages.berita', compact('news', 'categories'));
    }

    public function publicShow($slug)
    {
        $news = News::with('category')->where('slug', $slug)->firstOrFail();

        return view('pages.detail-berita', compact('news'));
    }
}