<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    public function index()
    {
        $aspirations = Aspiration::latest()->get();

        return view('admin.aspirations.index', compact('aspirations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'nullable|email',
            'message' => 'required',
        ]);

        Aspiration::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect('/kontak')
            ->with('success', 'Aspirasi berhasil dikirim. Terima kasih!');
    }

    public function destroy(Aspiration $aspiration)
    {
        $aspiration->delete();

        return redirect()->route('admin.aspirations.index')
            ->with('success', 'Aspirasi berhasil dihapus.');
    }
}