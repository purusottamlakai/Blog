<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id)
    {
        $data['post']=Post::find($id);
        return view('comments.add_comments',$data);
    }
}
