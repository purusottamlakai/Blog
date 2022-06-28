<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;


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
        return view('dashboard',$data);    
    }
}
