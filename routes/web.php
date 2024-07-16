<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $blog = Blog::where('id',1)->with('category')->first();

    views($blog)
    ->record();
    return view('welcome');
});


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
