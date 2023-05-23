<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    public function index(){
        $diskusis = Diskusi::orderBy("created_at", "desc")->get();
        return view("diskusi.index", ["diskusis" => $diskusis]);
    }
    public function post(Request $request){
        $data = $request->validate([
            "topic" => "required"
        ]);
        $data["user_id"] = Auth::user()->id;
        $diskusi = new Diskusi($data);
        $diskusi->save();
        return back();
    }
}
