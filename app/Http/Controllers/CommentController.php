<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Http\Requests\UpdateComment;
use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct(private CommentRepositoryInterface $commentRepository) 
    {
    }
    public function store(StoreComment $request,Post $post)
    {
         $this->commentRepository->storeComment($request,$post);
         return redirect()->back()->with('status','New Comment Added.'); 
    }
  
    public function edit($post,Comment $comment)
    {  
        $data['comment']=$comment;
        return view('comments.edit_comment',$data);
    }
    public function update(UpdateComment $request,$post, Comment $comment)
    {   
        $this->commentRepository->updateComment($request,$comment);
        return back()->with('status','Successfully Edited');
    }
    public function delete($post_id,$id)
    {   
        $this->commentRepository->deleteComment($id);
        return back()->with('status','Successfully Deleted');
    }

}
