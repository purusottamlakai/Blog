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
        $this->comment->create(['body'=>$request['body'],'post_id'=>$post->id,'user_id'=>auth()->id()]);
    }
    public function updateComment($request,$comment)
    {
        return $comment->update($request);
    } 
    public function deleteComment($id)
    {
        return $this->comment->find($id)->delete();
    } 

}
