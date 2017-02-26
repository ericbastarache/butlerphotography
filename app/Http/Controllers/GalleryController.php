<?php

namespace App\Http\Controllers;
use App\Photos;
use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function index () 
    {
    	$galleries = Gallery::all();
    	return view('gallery', compact('galleries'));
    }

    public function listGalleries ()
    {
    	$galleries = Gallery::all();
    	return view('admin.gallery.index', compact('galleries'));
    }

    public function createGallery ()
    {
        return view('admin.gallery.create');
    }

    public function saveGallery (Request $request)
    {
        $gallery = new Gallery();
        $name = $request['gallery-name'];
        $gallery->name = $name;
        $gallery->save();
        return redirect()->route('admin.gallery');
    }

    public function editGallery ($id)
    {
        $gallery = Gallery::where('id', $id)->get();
        return view('admin.gallery.update', compact('gallery'));
    }

    public function updateGallery(Request $request)
    {
        $id = $request['id'];
        $gallery = Gallery::find($id);
        $gallery->name = $request['gallery-name'];
        $gallery->save();

        return redirect()->route('admin.gallery')->with('success', 'Updated Gallery');
    }

    public function deleteGallery ($id)
    {
        $gallery = Gallery::find($id);
        if($gallery) {
            $gallery->delete();
            return redirect()->route('admin.gallery')->with('deleted', 'Deleted gallery');
        }
        return redirect()->route('admin.gallery')->with('error', 'Could not delete gallery');
    }
}
