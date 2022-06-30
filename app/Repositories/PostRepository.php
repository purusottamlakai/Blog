<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostRepositoryInterface
{
    public function __construct(protected Post $postModel)
    {
        
    }
    public function getAllPosts() 
    {
        return $this->postModel->cursorPaginate(4);
    }
    public function setCount($id)
    {   
        $post=$this->postModel->where('id', $id)
        ->increment('counts', 1);
    }
    public function showSinglePost($id)
    {
        return $this->postModel->find($id);
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
    public function deletePost($post_id)
    {
        return Post::find($post_id)->delete();

    }
}