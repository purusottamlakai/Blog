<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Interfaces\RatingRepositoryInterface;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function __construct(private RatingRepositoryInterface $ratingRepository)
    {
        
    }
    public function store(RatingRequest $request,$post_id)
    {
        $validated=$request->validated();
        $user= Auth::id();
        if(Rating::where('user_id',$user)->where('post_id',$post_id)->exists()){
            $this->ratingRepository->update($user,$post_id,$validated);
            return back()->with('status','Your rating is updated.');
        }
        else
        {
        $this->ratingRepository->store($user,$post_id,$validated);
        return back()->with('status','Thank you for your rating');
        }
    }
}
