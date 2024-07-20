<?php

use App\Http\Controllers\PageController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class,'index']);


Route::get('/read/blog/{id}', function ($id) {

        $blog = Blog::where('id',$id)->with('category')->first();

        $expiresAt = now()->addMinutes(5);

        views($blog)
        ->cooldown($expiresAt)
        ->record();

        return response()->json($blog);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
