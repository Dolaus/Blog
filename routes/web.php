<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace' => 'Main'], function (){
   Route::get('/',[\App\Http\Controllers\MainController::class,'index']);
});


Route::group(['namespace'=>'Admin','prefix'=>'admin'],function (){
    Route::group(['namespace' => 'Main'], function (){
        Route::get('/',[\App\Http\Controllers\Admin\Main\IndexController::class,'index']);
    });

    Route::group(['namespace'=>'Category','prefix'=>'categories'], function (){
       Route::get('/',[\App\Http\Controllers\Admin\Category\CategoryController::class,'index'])->name('admin.category.index');
       Route::get('/create',[\App\Http\Controllers\Admin\Category\CategoryController::class,'create'])->name('admin.category.create');
       Route::post('/',[\App\Http\Controllers\Admin\Category\CategoryController::class,'store'])->name('admin.category.store');
       Route::get('/{category}',[\App\Http\Controllers\Admin\Category\CategoryController::class,'show'])->name('admin.category.show');
       Route::get('/{category}/edit',[\App\Http\Controllers\Admin\Category\CategoryController::class,'edit'])->name('admin.category.edit');
       Route::put('/{category}',[\App\Http\Controllers\Admin\Category\CategoryController::class,'update'])->name('admin.category.update');
       Route::delete('/{category}',[\App\Http\Controllers\Admin\Category\CategoryController::class,'delete'])->name('admin.category.delete');


    });


    Route::group(['prefix' => 'tag'], function (){
        Route::get('/',[\App\Http\Controllers\Admin\Tag\TagController::class,'index'])->name('admin.tag.index');
        Route::get('/create',[\App\Http\Controllers\Admin\Tag\TagController::class,'create'])->name('admin.tag.create');
        Route::post('/',[\App\Http\Controllers\Admin\Tag\TagController::class,'store'])->name('admin.tag.store');
        Route::get('/{tag}',[\App\Http\Controllers\Admin\Tag\TagController::class,'show'])->name('admin.tag.show');
        Route::get('/{tag}/edit',[\App\Http\Controllers\Admin\Tag\TagController::class,'edit'])->name('admin.tag.edit');
        Route::put('/{tag}',[\App\Http\Controllers\Admin\Tag\TagController::class,'update'])->name('admin.tag.update');
        Route::delete('/{tag}',[\App\Http\Controllers\Admin\Tag\TagController::class,'delete'])->name('admin.tag.delete');
    });



    Route::group(['prefix' => 'post'], function (){
        Route::get('/',[\App\Http\Controllers\Admin\Post\PostController::class,'index'])->name('admin.post.index');
        Route::get('/create',[\App\Http\Controllers\Admin\Post\PostController::class,'create'])->name('admin.post.create');
        Route::post('/',[\App\Http\Controllers\Admin\Post\PostController::class,'store'])->name('admin.post.store');
        Route::get('/{post}',[\App\Http\Controllers\Admin\Post\PostController::class,'show'])->name('admin.post.show');
        Route::get('/{post}/edit',[\App\Http\Controllers\Admin\Post\PostController::class,'edit'])->name('admin.post.edit');
        Route::put('/{post}',[\App\Http\Controllers\Admin\Post\PostController::class,'update'])->name('admin.post.update');
        Route::delete('/{post}',[\App\Http\Controllers\Admin\Post\PostController::class,'delete'])->name('admin.post.delete');
    });
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
