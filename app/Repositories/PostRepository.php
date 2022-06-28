<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostRepositoryInterface
{
    public function getAllPosts() 
    {
        return Post::cursorPaginate(6);
    }
    public function storePost($request) 
    {
        $validated=$request->validated();
        $post=new Post;
        $post->title=$validated['title'];
        $post->body=$validated['body'];
        $post->user()->associate(Auth::user());
        $post->save();
    }
    public function editPost($id)
    {
        return Post::find($id);

    }
    public function updatePost($request,$id)
    {
        $validated=$request->validated();
        $post=Post::find($id);
        $post->title=$validated['title'];
        $post->body=$validated['body'];
        $post->save(); 
    }
}