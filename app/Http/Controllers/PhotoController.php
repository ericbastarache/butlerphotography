<?php

namespace App\Http\Controllers;

use App\Photos;
use App\Gallery;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //
    /*public function index ()
    {
        $photos = Photos::all();
        $gallery = Galleries::all();
        $galleryId = $gallery->photos()->get();
        return view('gallery', compact)
    }*/

    public function showPhotos ()
    {
    	$photos = Photos::all();
    	return view('admin.photos.index', compact('photos'));
    }

    public function newPhoto ()
    {
        $galleries = Gallery::all();
    	return view('admin.photos.upload', compact('galleries'));
    }

    public function uploadPhoto (Request $request)
    {
        $photo = new Photos();
        $photo->title = stripslashes($request['photo-title']);
        $photo->description = stripslashes($request['photo-description']);
        $url = $request->file('photo-url')->move(public_path('images/uploads'), $request->file('photo-url')->getClientOriginalName());
        $photo->url = substr(public_path('images/uploads') . '/' . $request->file('photo-url')->getClientOriginalName(), 64, strlen($url));
        $photo->gallery_id = stripslashes($request['gallery-id']);
        $photo->user_id = \Auth::user()->id;
        $photo->save();

        return redirect()->route('admin.newPhoto')->with('success', 'Added image');
    }

    public function deletePhoto ($id)
    {
        $photo = Photos::findById($id);
        $photo->delete();
        return redirect()->route('admin.showPhotos')->with('success', 'Deleted photo');
    }
}
