<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Setting;
use Illuminate\Http\Request;

class MemberController extends Controller
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
        $members = Member::latest()->get();

        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'division' => 'nullable|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $uploadPath = $this->uploadPath('members');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();

            $photo->move($uploadPath, $photoName);

            $photoPath = 'uploads/members/' . $photoName;
        }

        Member::create([
            'name' => $request->name,
            'position' => $request->position,
            'division' => $request->division,
            'photo' => $photoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.members.index')
            ->with('success', 'Pengurus berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        return view('admin.members.edit', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'division' => 'nullable|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description' => 'nullable',
        ]);

        $photoPath = $member->photo;

        if ($request->hasFile('photo')) {
            $uploadPath = $this->uploadPath('members');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $oldPhoto = $this->filePath($member->photo);

            if ($oldPhoto && file_exists($oldPhoto)) {
                unlink($oldPhoto);
            }

            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();

            $photo->move($uploadPath, $photoName);

            $photoPath = 'uploads/members/' . $photoName;
        }

        $member->update([
            'name' => $request->name,
            'position' => $request->position,
            'division' => $request->division,
            'photo' => $photoPath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.members.index')
            ->with('success', 'Pengurus berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        $photoPath = $this->filePath($member->photo);

        if ($photoPath && file_exists($photoPath)) {
            unlink($photoPath);
        }

        $member->delete();

        return redirect()->route('admin.members.index')
            ->with('success', 'Pengurus berhasil dihapus.');
    }

    public function publicProfile()
    {
        $members = Member::latest()->get();
        $setting = Setting::first();

        return view('pages.profil', compact('members', 'setting'));
    }
}