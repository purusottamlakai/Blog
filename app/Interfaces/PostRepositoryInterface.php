<?php

namespace App\Interfaces;

interface PostRepositoryInterface 
{
    public function storePost($request);
    public function editPost($id);
    public function updatePost($request,$id);
    public function getAllPosts();
    
}