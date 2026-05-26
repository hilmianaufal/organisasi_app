<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    private function uploadPath(string $folder): string
    {
        if (app()->environment('local')) {
            return public_path('uploads/' . $folder);
        }

        return $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $folder;
    }

    private function filePath(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (app()->environment('local')) {
            return public_path($path);
        }

        return $_SERVER['DOCUMENT_ROOT'] . '/' . $path;
    }

    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable',
            'activity_date' => 'nullable|date',
        ]);

        $uploadPath = $this->uploadPath('galleries');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $image->move($uploadPath, $imageName);

        Gallery::create([
            'title' => $request->title,
            'image' => 'uploads/galleries/' . $imageName,
            'description' => $request->description,
            'activity_date' => $request->activity_date,
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable',
            'activity_date' => 'nullable|date',
        ]);

        $imagePath = $gallery->image;

        if ($request->hasFile('image')) {
            $uploadPath = $this->uploadPath('galleries');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $oldImage = $this->filePath($gallery->image);

            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $imagePath = 'uploads/galleries/' . $imageName;
        }

        $gallery->update([
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
            'activity_date' => $request->activity_date,
        ]);

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $imagePath = $this->filePath($gallery->image);

        if ($imagePath && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $gallery->delete();

        return redirect()->route('admin.galleries.index')
            ->with('success', 'Galeri berhasil dihapus.');
    }

    public function publicIndex()
    {
        $galleries = Gallery::latest()->get();

        return view('pages.galeri', compact('galleries'));
    }
}