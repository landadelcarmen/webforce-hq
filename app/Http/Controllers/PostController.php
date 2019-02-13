<?php

namespace App\Http\Controllers;

use App\Filters\PostsFilter;
use App\Post;

class PostController extends Controller
{
    public function index(PostsFilter $filters)
    {
        $posts = $this->getPosts($filters);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load('tags', 'author');

        return view('posts.show', compact('post'));
    }

    public function getPosts($filters)
    {
        return Post::orderBy('posts.created_at', 'desc')
                   ->filter($filters)
                   ->with('tags', 'author')
                   ->get();
    }

}
