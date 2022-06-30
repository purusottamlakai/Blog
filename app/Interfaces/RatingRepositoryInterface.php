<?php

namespace App\Interfaces;

interface RatingRepositoryInterface 
{
    public function store($user,$post_id,$validated);
    public function update($user,$post_id,$validated);
    
}