<?php

namespace App\Interfaces;

interface PostRepositoryInterface 
{
    public function getAllPosts();
    public function storePost($request);
    public function editPost($id);
    public function updatePost($request,$post);
    public function deletePost($post);    
    public function setCount($id);    
}
