<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Http\Requests\StorePost;
use App\Http\Requests\UpdatePost;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {
        return view('admin.posts.index')
                    ->with('posts', Post::with('tags', 'author')->latest()->get());
    }

    public function create()
    {
        $this->authorize('create', Post::class);

        return view('admin.posts.create')
                    ->with('tags', Tag::all());
    }

    public function store(StorePost $request)
    {
        $this->authorize('create', Post::class);

        return $request->store();
    }

    public function show(Post $post)
    {
        $post->load('tags', 'author');

        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $post->load('tags', 'author');

        $tags = Tag::all();

        return view('admin.posts.edit', compact('post', 'tags'));
    }

    public function update(UpdatePost $request, Post $post)
    {
        $this->authorize('update', $post);

        return $request->update($post);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->tags()->detach();
        $post->delete();
    }
}
