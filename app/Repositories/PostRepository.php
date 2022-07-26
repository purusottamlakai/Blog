<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Str;
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
        $data=$request->validated();
        $slug=Str::slug($request->title.'-'.now()->format('Ymd'));
        $this->post->create($data + ['slug'=>$slug,'user_id' => auth()->id()]);
    }
    public function editPost($id)
    {
        return $this->post->find($id);

    }
    public function updatePost($request,$post)
    {   
        $data=$request->validated();
        $slug=Str::slug($request->title.'-'.now()->format('Ymd'));
        $post->update($data + ['slug'=>$slug]);
   
    }
    public function deletePost($post)
    {
        $this->post->find($post)->delete();
    }
}