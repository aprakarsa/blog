<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index() {
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = Post::latest()->get();

        // $posts = Post::latest();

        // if($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }

        // if($year = request('year')) {
        //     $posts->whereYear('created_at', $year);
        // }

        // $posts = $posts->get();

        $posts = Post::latest()
            ->filter([
                'month' => request('month'),
                'year' => request('year')
            ])
            ->get();

        // $archives = Post::archive();

    	return view('posts.index', compact('posts'));
    }


    public function create() {
    	return view('posts.create');
    }


    public function store() {
    	// dd(request('body'));

    	// Create an new post using request data
    	// $post = new Post;
    	// $post = new \App\Post;

    	// $post->title = request('title');
    	// $post->body = request('body');

    	// Save it to the database
    	// $post->save();

    	$this->validate(request(),[
    		'title' => 'required|min:2',
    		'body' => 'required|min:2'
    	]);

        // Post::create(request(['title', 'body']));

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

    	// Post::create([
     //        'title' => request('title'),
     //        'body' => request('body'),
     //        // 'user_id' => auth()->user()->id
     //        'user_id' => auth()->id()
     //    ]);

    	// redirect to the home page
    	return redirect('/')->with('status','New post added!');
    }


    public function show(Post $post) {

        return view('posts.show', compact('post'));
    }


}
