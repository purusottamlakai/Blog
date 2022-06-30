<?php

namespace App\Repositories;

use App\Interfaces\RatingRepositoryInterface;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingRepository implements RatingRepositoryInterface
{
    
    public function store($user,$post_id,$validated)
    {
        $rating=new Rating();
        $rating->stars_rated=$validated['stars_rated'];
        $rating->post_id=$post_id;
        $rating->user_id=$user;
        $rating->save();
        return $rating->stars_rated;

    }
    public function update($user,$post_id,$validated)
    {
        $rating=Rating::where('user_id',$user)->where('post_id',$post_id)->first();
        $rating->stars_rated=$validated['stars_rated'];
        $rating->update();
        return $rating->stars_rated;
    }
}