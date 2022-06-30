<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(RatingRequest $request,$post_id)
    {
        $validated=$request->validated();
        $user= Auth::id();
        if(Rating::where('user_id',$user)->where('post_id',$post_id)->exists()){
            return back()->with('status','Already rated.');
        }
        else
        {
        $rating=new Rating();
        $rating->stars_rated=$validated['stars_rated'];
        $rating->post_id=$post_id;
        $rating->user_id=$user;
        $rating->save();
        return back()->with('status','Thank you for your rating');
        }
    }
}
