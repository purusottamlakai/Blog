<?php

namespace App\Interfaces;

interface PostRepositoryInterface 
{
    public function getAllPosts();
    public function storePost($request);
    public function editPost($id);
    public function updatePost($request,$id);
    public function setCount($id);    
}