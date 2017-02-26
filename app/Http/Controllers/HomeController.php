<?php

namespace App\Http\Controllers;

use App\About;
use App\Posts;
use App\Photos;
use App\Orders;
use App\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $about = About::all();
    	  $posts = Posts::orderBy('created_at')->take(3)->get();
    	  $photos = Photos::orderBy('created_at')->take(12)->get();
        $images = Photos::orderBy('created_at')->take(3)->get();
        $carouselPhotos = Photos::orderBy('created_at')->take(5)->get();
        return view('index', compact(['posts', 'photos', 'about', 'carouselPhotos', 'images']));
    }

    public function contact ()
    {
        return view('contact');
    }

    public function dashboard ()
    {
        $posts = Posts::orderBy('created_at')->take(5)->get();
        $orders = Orders::orderBy('created_at')->take(5)->get();
    	return view('admin.dashboard', compact(['posts', 'orders']));
    }
}
