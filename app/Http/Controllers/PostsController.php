<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index () 
    {
    	$posts = Posts::paginate(12);
    	return view('blog.index', compact('posts'));
    }

    public function blogPost($slug) 
    {
    	$post = Posts::where('slug', $slug)->get();
    	$recentPosts = Posts::paginate(4);
    	return view('blog.blog-post', compact(['post', 'recentPosts']));
    }

    public function searchPosts (Request $request) 
    {
        $postTitle = $request['q'];
        $posts = Posts::where('title', 'LIKE', '%'. $postTitle .'%')->get();
        return view('blog.results', compact(['posts']));
        
    }

    public function writePost ()
    {
        return view('admin.posts.create');
    }

    public function editPost ($id)
    {
        $posts = Posts::where('id', $id)->get();
        return view('admin.posts.update', compact('posts'));
    }

    public function savePost (Request $request)
    {
        $post = new Posts();
        $title = $request['post-title'];
        
        $slug = str_slug($title, "-");
        $content = $request['post-content'];
        
        $post->title = $title;
        $post->slug = $slug;
        $url = $request->file('post-url')->move(public_path('images/uploads'), $request->file('post-url')->getClientOriginalName());
        $post->url = substr(public_path('images/uploads') . '/' . $request->file('post-url')->getClientOriginalName(), 37, strlen($url));
        $post->content = $content;
        $post->save();
        return redirect()->route('admin.createPost')->with('success', 'Added new post to blog');
    }

    public function listPosts ()
    {
        $posts = Posts::paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function updatePost (Request $request)
    {
        $id = $request['id'];
        $post = Posts::find($id);
        $post->title = $request['post-title'];
        $post->slug = str_slug($post->title, "-");
        $url = $request->file('post-url')->move(public_path('images/uploads'), $request->file('post-url')->getClientOriginalName());
        $post->url = substr(public_path('images/uploads') . '/' . $request->file('post-url')->getClientOriginalName(), 37, strlen($url));
        $post->content = $request['post-content'];
        $post->save();
        return redirect()->route('admin.listPosts')->with('success', 'Successfully updated post');
    }

    public function deletePost ($id)
    {
        $post = Posts::find($id);
        if($post) {
            $post->delete();
            return redirect()->route('admin.listPosts')->with('deleted', 'Post deleted');
        } else {
            return redirect()->route('admin.listPosts')->with('error', 'Could not delete post');
        }
    }
}
