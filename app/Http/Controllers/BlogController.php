<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //
    public function index(){
        $posts = Post::where('published_at','<=',Carbon::now())
            ->orderBy('published_at','desc')
            ->paginate(config('blog.posts_per_page'));
        echo $posts;
        return view('blog.index', compact('posts'));
    }

    public function showPost($slug)
    {
        $posts = Post::whereSlug($slug)->firstOrFail();
        return view('blog.post')-withPost($posts);
    }

}
