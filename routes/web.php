<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;


Route::view('/','welcome');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard',[HomeController::class,'show'])->name('dashboard');
    /* Post's Routes */
    Route::get('/post/add',[PostController::class,'index'])->name('post.add');
    Route::post('/post/add',[PostController::class,'store'])->name('post.store');
    Route::get('/posts/{post_id}',[PostController::class,'show'])->name('post.show');
    Route::get('/posts/{post_id}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::put('/posts/{post_id}/',[PostController::class,'update'])->name('post.update');
    Route::get('/posts/{post_id}/delete',[PostController::class,'delete'])->name('post.delete');
   
    /* Rating's Routes */
    Route::get('/posts/{post_id}/rating',[RatingController::class,'store'])->name('rating.store');
     /* Comment's Routes */
     Route::post('/posts/{post_id}/comments/store',[CommentController::class,'store'])->name('comment.store');
     Route::get('/posts/{post_id}/comments',[CommentController::class,'show'])->name('comment.show');
     Route::get('/posts/{post_id}/comments/{id}/edit',[CommentController::class,'edit'])->name('comment.edit');
     Route::put('/posts/{post_id}/comments/{id}',[CommentController::class,'update'])->name('comment.update');
     Route::get('/posts/{post_id}/comments/{id}/delete',[CommentController::class,'delete'])->name('comment.delete');



});

require __DIR__.'/auth.php';
