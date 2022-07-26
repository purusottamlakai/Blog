<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct(protected Category $category)
    {
       
    }
    public function index()
    {
        $data['categories']=$this->category->all();
        $f_id=$data['categories']->first()->id;
        $data['posts']=Post::where('category_id',$f_id)->simplePaginate(5);
        $data['authUser'] = Auth::user();
        return view('categories.show_categories',$data);
    }
    public function showPosts($category)
    {
        $data['categories']=$this->category->all();
        $data['posts']=Post::where('category_id',$category)->simplePaginate(5);
        $data['authUser'] = Auth::user();
        return view('categories.show_categories',$data);
    }
    public function getAll()
    {
        $data['categories']=$this->category->all();
        return view('admin.category',$data);
    }
    
    public function create()
    {   
        $data['categories']=$this->category->all();
        return view('categories.create',$data);
    }
    public function store(Request $request)
    {
        $category=new $this->category;
        $category->name=$request->category_name;
        $category->save();
        return back()->with('status','New Category is Added.');
    }
    public function edit(Category $category)
    {
        $data['category']=$category;
        return view('categories.edit',$data);
    }
    public function update(Request $request, Category $category)
    {
        $category->name=$request->name;
        $category->save();
        return redirect()->route('admin.category')->with('status','Category is updated.');;
    }
    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('admin.category')->with('status','Category is updated.');;
    }

}
