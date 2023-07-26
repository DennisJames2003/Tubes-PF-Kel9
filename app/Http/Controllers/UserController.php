<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Contoh: Batas maksimum file adalah 2MB
        ]);

        $imageName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('uploads'), $imageName);

        // Jika Anda menyimpan foto dalam tabel pengguna, Anda dapat mengganti kolom 'photo' dengan $imageName
        Auth::user()->update(['photo' => $imageName]);

        return redirect()->back()->with('success', 'Foto berhasil diunggah!');
    }
}
