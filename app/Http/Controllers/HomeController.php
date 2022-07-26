<?php

namespace App\Http\Controllers;
use App\Models\{Category, Comment,Post, User};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    $data['posts']=Post::with('category')->cursorPaginate(4);
    $data['categories']=Category::all();
    return view('home',$data);
    }
    public function search(Request $request)
    {
        $q = $request->input('query');
        $data['categories']=Category::all();
        $data['posts'] = Post::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->paginate();
        if(count($data['posts']) > 0)
            return view('home',$data);
        else return view ('home',$data)->with('status','No Details found. Try to search again !');
    }
    public function getCategoryPosts($id)
    {   
        $data['posts']=Post::where('category_id',$id)->paginate();
        $data['categories']=Category::all();
        return view('home',$data);
    }
}
