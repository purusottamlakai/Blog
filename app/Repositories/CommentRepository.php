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
    public function storeComment($request,$post)
    {
        $validated=$request->validated();
        $comment=new Comment;
        $comment->body=$validated['body'];
        $comment->user_id=Auth::user()->id;
        $comment->post_id=$post->id;
        $comment->save();
    }
    public function updateComment($request,$comment)
    {
        $validated=$request->validated();
        $comment->body=$validated['body'];
        $comment->update();
        return $comment->post;
    } 
    public function deleteComment($id)
    {
        return Comment::find($id)->delete();
    } 

}
