<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
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
        $programs = Program::latest()->get();

        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required',
            'status' => 'required',
            'program_date' => 'nullable|date',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $uploadPath = $this->uploadPath('programs');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $imagePath = 'uploads/programs/' . $imageName;
        }

        Program::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status,
            'program_date' => $request->program_date,
        ]);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil ditambahkan.');
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'required',
            'status' => 'required',
            'program_date' => 'nullable|date',
        ]);

        $imagePath = $program->image;

        if ($request->hasFile('image')) {
            $uploadPath = $this->uploadPath('programs');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $oldImage = $this->filePath($program->image);

            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move($uploadPath, $imageName);

            $imagePath = 'uploads/programs/' . $imageName;
        }

        $program->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'image' => $imagePath,
            'description' => $request->description,
            'status' => $request->status,
            'program_date' => $request->program_date,
        ]);

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        $imagePath = $this->filePath($program->image);

        if ($imagePath && file_exists($imagePath)) {
            unlink($imagePath);
        }

        $program->delete();

        return redirect()->route('admin.programs.index')
            ->with('success', 'Program berhasil dihapus.');
    }

    public function publicIndex()
    {
        $programs = Program::latest()->get();

        return view('pages.program', compact('programs'));
    }
}