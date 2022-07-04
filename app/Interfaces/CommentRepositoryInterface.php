<?php

namespace App\Interfaces;

interface CommentRepositoryInterface 
{
    public function storeComment($request,$post);
    public function updateComment($request,$comment);  
    public function deleteComment($id);            
}