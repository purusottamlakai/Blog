<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories']=Category::all();
        $f_id=$data['categories']->first()->id;
        $data['posts']=Post::where('category_id',$f_id)->simplePaginate(5);
        $data['authUser'] = Auth::user();
        return view('categories.show_categories',$data);
    }
    public function showPosts($category)
    {
        $data['categories']=Category::all();
        $data['posts']=Post::where('category_id',$category)->simplePaginate(5);
        $data['authUser'] = Auth::user();
        return view('categories.show_categories',$data);
    }

}
