<?php

use App\Http\Controllers\{AdminController,CategoryController,CommentController, HomeController, PostController,RatingController};
use App\Models\{Category, Comment,Post, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Home page's route */
Route::get('/',[HomeController::class,'index'])->name('home');
Route::any('/',[HomeController::class,'search'])->name('search');
Route::get('/{category}/posts',[HomeController::class,'getCategoryPosts'])->name('getCategoryPosts');


Route::group(['middleware'=>['auth']],function(){
    /* Post's Routes */
    Route::get('/dashboard',[PostController::class,'index'])->name('dashboard');
    Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
    Route::post('/posts',[PostController::class,'store'])->name('post.store');
    Route::get('/posts/{slug}',[PostController::class,'show'])->name('post.show');
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

/*  Admin Routes*/
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']],function(){
    Route::get('/dashboard',[AdminController::class,'showDashbord'])->name('admin.dashboard');
    Route::get('/posts/all',[AdminController::class,'showPosts'])->name('admin.post.show');
    Route::get('/users/{user}/delete',[AdminController::class,'deleteUser'])->name('user.delete');
    Route::get('/categories',[CategoryController::class,'getAll'])->name('admin.category');
    Route::get('categories/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/categories',[CategoryController::class,'store'])->name('category.store');
    Route::get('categories/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('categories/{category}/update',[CategoryController::class,'update'])->name('category.update');
    Route::get('/categories/{category}/delete',[CategoryController::class,'delete'])->name('category.delete');

});
require __DIR__.'/auth.php';
