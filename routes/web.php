<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::view('/','welcome');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard',[HomeController::class,'show'])->name('dashboard');
    Route::view('/post/add','posts.add_post')->name('post.add');
    Route::post('/post/add',[PostController::class,'store'])->name('post.store');
    Route::get('/posts/{post_id}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::put('/posts/{post_id}/update',[PostController::class,'update'])->name('post.update');
    Route::get('/posts/{post_id}/comments',[CommentController::class,'index'])->name('comments.add');


});

require __DIR__.'/auth.php';
