<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Investasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function display($id)
    {
        $artikel = Artikel::find($id);
        return view("artikel.artikel", ["artikel" => $artikel]);
    }

    public function getpic($name)
    {
        if (Storage::has("artikel/" . $name)) {
            return response()->file(storage_path("app/" . "artikel/" . $name));
        }
        abort(404);
    }

    public function delete($id)
    {
        $artikel = Artikel::find($id);
        if (Auth::user()->role->role_name === "admin") {
            $artikel->delete();
        }
        return back();
    }

    public function list()
    {
        $artikels = Artikel::all();
        return view("artikel.list", ["artikels" => $artikels]);
    }

    public function editForm($id)
    {
        $artikel = Artikel::find($id);
        return view("artikel.edit", ["artikel" => $artikel]);
    }

    public function edit($id, Request $request)
    {
        $data = $request->validate([
            "judul" => "required",
            "deskripsi" => "required",
            "gambar" => "nullable|image"
        ]);
        $artikel = Artikel::find($id);
        $gambar = $request->file("gambar");
        if ($gambar) {
            $artikel->gambar = Storage::put("artikel", $gambar);
        }
        $artikel->judul = $data["judul"];
        $artikel->deskripsi = $data["deskripsi"];
        $artikel->save();
        return redirect("/artikel/" . $artikel->id);
    }

    public function createForm()
    {
        return view("artikel.create");
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            "judul" => "required",
            "deskripsi" => "required",
            "gambar" => "required|image"
        ]);
        $data["user_id"] = Auth::id();
        $gambar = $request->file("gambar");
        if (!$gambar) {
            return back();
        }
        $data["gambar"] = Storage::put("artikel", $gambar);
        $artikel = new Artikel($data);
        $artikel->save();
        return redirect("/artikel/" . $artikel->id);
    }
}
