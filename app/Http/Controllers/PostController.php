<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $PostRepository;

    public function __construct(PostRepositoryInterface $PostRepository) 
    {
        $this->PostRepository = $PostRepository;
    }
    public function store(PostRequest $request)
    {
        $this->PostRepository->storePost($request);
        return redirect()->route('dashboard')->with('status',"New Post is created.");     
    }
    public function edit($id)
    {
        $data['post']=$this->PostRepository->editPost($id);
        return view('posts.edit_post',$data);
    }
    public function update(PostRequest $request,$id)
    {
        $this->PostRepository->updatePost($request,$id);
        return redirect()->route('dashboard')->with('status','Successfully Updated.');
             
    }
}