<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function about ()
    {
    	$about = About::all();
    	return view('admin.about.index', compact('about'));
    }

    public function writeAbout()
    {
    	return view('admin.about.create');
    }

    public function saveAbout (Request $request)
    {
    	$about = new About();
    	$about->bio = stripslashes($request['about-text']);
    	$url = $request->file('about-url')->move(public_path('images/uploads'), $request->file('about-url')->getClientOriginalName());
    	$about->image = substr(public_path('images/uploads') . '/' . $request->file('about-url')->getClientOriginalName(), 37, strlen($url));
    	$about->save();
    	return redirect()->route('admin.about')->with('success', 'Successfully published About Me');
    }

    public function editAbout ($id)
    {
    	$about = About::find($id)->get();
    	return view('admin.about.update', compact('about'));
    }

    public function updateAbout (Request $request)
    {
    	$id = $request['id'];
    	$about = About::find($id)->get();
    	$about->bio = $request['about-text'];
    	$url = $request->file('about-url')->move(public_path('images/uploads'), $request->file('about-url')->getClientOriginalName());
    	$about->image = substr(public_path('images/uploads') . '/' . $request->file('about-url')->getClientOriginalName(), 37, strlen($url));
    	$about->save();
    	return redirect()->route('admin.about')->with('success', 'Updated About Me');
    }

}
