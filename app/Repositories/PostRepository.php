<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository implements PostRepositoryInterface
{
    public function __construct(protected Post $post)
    {
        
    }
    public function getAllPosts() 
    {
        return $this->post->latest()->cursorPaginate(5);
    }
    public function setCount($id)
    {   
        $post=$this->post->where('id', $id)
        ->increment('counts', 1);
    }
    public function storePost($request) 
    {
        $this->post->create(['title'=>$request['title'],'body'=>$request['body'],'category_id'=>$request['category_id'],'user_id' => Auth::id()]);
    }
    public function editPost($id)
    {
        return $this->post->find($id);

    }
    public function updatePost($request,$post)
    {
        $post->update($request);
    }
    public function deletePost($post)
    {
        $this->post->find($post)->delete();
    }
}