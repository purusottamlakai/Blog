<?php

namespace App\Interfaces;

interface CommentRepositoryInterface 
{
    public function storeComment($request,$post_id);
    public function showComment($post_id);
    public function editComment($id);
    public function updateComment($request,$id);  
    public function deleteComment($id);            
}