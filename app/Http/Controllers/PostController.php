<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Comment;

class PostController extends Controller
{
    public function __construct(private PostRepositoryInterface $PostRepository) 
    {
    }
    public function index()
    {
        return view('posts.add_post');
    }
    public function show($id)
    {   
        $this->PostRepository->setCount($id);
        $data['post']=$this->PostRepository->showSinglePost($id);
        $data['authUser']=Auth::id();
        return view('posts.show_post',$data);
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
    public function delete($post_id)
    {   
        $this->PostRepository->deletePost($post_id);
        return back()->with('status','Post is deleted.');
    }
    
}