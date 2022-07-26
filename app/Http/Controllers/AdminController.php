<?php

namespace App\Http\Controllers;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository=$postRepository;
    }

    public function showDashbord()
    {
        $data['users']=User::cursorPaginate(9);
        $data['authUser']=Auth::user()->id;
        return view('admin.dashboard',$data);
    }
    public function showPosts()
    {  
        $data['posts']=Post::latest()->paginate(10);
        return view('admin.post',$data);
    }
    public function showCategory(Request $request)
    {  
        // $data=$this->postRepository->showCategory($request);
        // return view('admin.category',$data);
    }
    
    public function destroy($id)
    {
        // $this->postRepository->destroy($id);
        // return redirect()->route('admin.post')->with('status','Post is Deleted.');
    }
    public function deleteUser($user)
    {   User::find($user)->delete();
        return back()->with('status','A user is Deleted.');
    }
}
