<?php

namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentRepository implements CommentRepositoryInterface
{
    public function __construct(protected Comment $comment)
    {
        
    }
    public function storeComment($request,$post_id)
    {
        $validated=$request->validated();
        $comment=new Comment;
        $comment->body=$validated['body'];
        $comment->user_id=Auth::user()->id;
        $comment->post_id=$post_id;
        $comment->save();
    }
    public function showComment($post_id)
    {
        return $this->comment->where('post_id','=',$post_id)->latest()->cursorPaginate(4);
    } 
    public function editComment($id)
    {
        return Comment::find($id);
    } 
    public function updateComment($request,$id)
    {
        $validated=$request->validated();
        $comment=Comment::find($id);
        $comment->body=$validated['body'];
        $comment->user_id=Auth::id();
        $comment->post_id=$comment->post_id;
        $comment->save();   
    } 
    public function deleteComment($id)
    {
        return Comment::find($id)->delete();
    } 

}
