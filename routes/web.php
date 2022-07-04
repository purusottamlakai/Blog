<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
return view('welcome');
});
Route::group(['middleware'=>['auth']],function(){
    /* Post's Routes */
    Route::get('/dashboard',[PostController::class,'index'])->name('dashboard');
    Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
    Route::post('/posts',[PostController::class,'store'])->name('post.store');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::put('/posts/{post}',[PostController::class,'update'])->name('post.update');
    Route::get('/posts/{post}/delete',[PostController::class,'destroy'])->name('post.delete');
   
    /* Rating's Routes */
    Route::get('/posts/{post}/rating',[RatingController::class,'store'])->name('rating.store');
     /* Comment's Routes */
     Route::post('/posts/{post}/comments/store',[CommentController::class,'store'])->name('comment.store');
     Route::get('/posts/{post}/comments/{comment}/edit',[CommentController::class,'edit'])->name('comment.edit');
     Route::put('/posts/{post}/comments/{comment}',[CommentController::class,'update'])->name('comment.update');
     Route::get('/posts/{post}/comments/{comment}/delete',[CommentController::class,'delete'])->name('comment.delete');
     /* Category's Routes */
     Route::get('/categories',[CategoryController::class,'index'])->name('category.index');
     Route::get('/categories/{category}/posts',[CategoryController::class,'showPosts'])->name('category.post');





});

require __DIR__.'/auth.php';
