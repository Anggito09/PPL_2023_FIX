<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function create(Request $request){
        $data = $request->validate([
            "judul" => "required",
            "deskripsi" => "required",
            "gambar" => "required|image"
        ]);
        $data["user_id"] = Auth::id();
        $gambar = $request->file("gambar");
        if(!$gambar){
            return back();
        }
        $data["gambar"] = Storage::put("artikel", $gambar);
        $artikel = new Artikel($data);
        $artikel->save();
        return redirect("/artikel");
    }
}
