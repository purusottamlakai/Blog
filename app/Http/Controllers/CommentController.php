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
    private CommentRepositoryInterface $CommentRepository;

    public function __construct(CommentRepositoryInterface $CommentRepository) 
    {
        $this->CommentRepository = $CommentRepository;
    }
    public function store(StoreComment $request,$post_id)
    {
         $this->CommentRepository->storeComment($request,$post_id);
         return redirect()->back()->with('status','New Comment Added.'); 
    }
    public function show($post_id)
    {   
        $data['comments']=$this->CommentRepository->showComment($post_id);
        $data['authUser']=Auth::id();
        return view('comments.show_comments',$data);
    }
    public function edit($post_id,$id)
    {   
        $comment=$this->CommentRepository->editComment($id);
        return view('comments.edit_comment',compact('comment'));
    }
    public function update(UpdateComment $request,$post_id,$id)
    {   
        $this->CommentRepository->updateComment($request,$id);
        return redirect()->route('comment.show',['post_id'=>$post_id])->with('status','Successfully Edited');
    }
    public function delete($post_id,$id)
    {   
        $this->CommentRepository->deleteComment($id);
        return back()->with('status','Successfully Deleted');
    }

}
