<?php

namespace App\Http\Controllers;

use App\Models\Diskusi;
use App\Models\DiskusiKomen;
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
    public function postComment($id, Request $request){
        $data = $request->validate([
            "comment"=>"required"
        ]);
        $data["user_id"] = Auth::user()->id;
        $data["diskusi_id"] = $id;
        $comment = new DiskusiKomen($data);
        $comment->save();
        return back();
    }

    public function delete($id){
        if(Auth::user()->role->role_name === "admin"){
            DiskusiKomen::where("diskusi_id", $id)->delete();
            $diskusi = Diskusi::find($id);
            $diskusi->visible = !$diskusi->visible;
            $diskusi->save();
        }
        return back();
    }
}
