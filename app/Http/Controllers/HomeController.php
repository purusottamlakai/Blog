<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private PostRepositoryInterface $PostRepository;

    public function __construct(PostRepositoryInterface $PostRepository) 
    {
        $this->PostRepository = $PostRepository;
    }
    public function show()
    {
        $data['posts']=$this->PostRepository->getAllPosts();
        $data['authUser']=Auth::id();
        return view('dashboard',$data);    
    }
    
}
