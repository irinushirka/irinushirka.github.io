<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Auth;

class GalleryController extends Controller
{
    public function gallery(){
        $user_id = Auth::user()->id;
        $photos = Gallery::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(10);
        return view('user_pages.gallery.gallery', compact('photos'));
    }

    public function deletePhoto($id){
        $user_id = Auth::user()->id;
        Gallery::where('user_id', $user_id)->where('id', $id)->delete();
        return redirect()->to('/gallery');
    }

    public function loadPhoto(Request $r){
        Gallery::create([
            'user_id' => Auth::user()->id,
            'image' => $r['photo'],
            'description' => $r['description'],
        ]);
        return redirect()->to('/gallery');
    }
}
