<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SorcialController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ReferanceController;
use App\Http\Controllers\Api\SiteSettingController;



Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {

    Route::get('/user', function (Request $request) {
            return $request->user();
    })->middleware(['auth:sanctum','is_admin']);

    Route::post('login',[UserController::class,'login']);
    Route::post('register',[UserController::class,'register']);


    Route::post('forgot-password',[UserController::class,'sendResetLinkEmail']);
    Route::post('reset-password',[UserController::class,'resetPassword']);

});



Route::group(['middleware' => ['auth:sanctum','is_admin']], function () {


Route::get('/about', [AboutController::class, 'index']);
Route::post('/about/update', [AboutController::class, 'update']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact/store', [ContactController::class, 'store']);
Route::post('/contact/mail/send', [ContactController::class, 'mailSend']);
Route::post('/subscribe/store', [ContactController::class, 'subscribeForm']);


Route::get('/careers', [CareerController::class, 'index']);
Route::post('/career/store', [CareerController::class, 'store']);
Route::post('/career/{id}/update', [CareerController::class, 'update']);


Route::get('/educations', [EducationController::class, 'index']);
Route::post('/education/store', [EducationController::class, 'store']);
Route::post('/education/{id}/update', [EducationController::class, 'update']);

Route::get('/tags', [TagController::class, 'index']);
Route::get('/tag/{id}', [TagController::class, 'edit']);
Route::post('/tags/store', [TagController::class, 'store']);
Route::post('/tags/{id}/update', [TagController::class, 'update']);


Route::get('/sliders', [SliderController::class, 'index']);
Route::get('/slider/{id}', [SliderController::class, 'edit']);
Route::post('/slider/store', [SliderController::class, 'store']);
Route::post('/slider/{id}/update', [SliderController::class, 'update']);



Route::get('/sorcialmedias', [SorcialController::class, 'index']);
Route::get('/sorcialmedia/{id}', [SorcialController::class, 'edit']);
Route::post('/sorcialmedia/store', [SorcialController::class, 'store']);
Route::post('/sorcialmedia/{id}/update', [SorcialController::class, 'update']);
Route::post('/sorcialmedia/sortable', [SorcialController::class, 'order']);



Route::get('/sitesetting', [SiteSettingController::class, 'index']);
Route::get('/sitesetting/{id}', [SiteSettingController::class, 'edit']);
Route::post('/sitesetting/store', [SiteSettingController::class, 'store']);
Route::post('/sitesetting/{id}/update', [SiteSettingController::class, 'update']);




Route::get('/referances', [ReferanceController::class, 'index']);
Route::get('/referance/{id}', [ReferanceController::class, 'edit']);
Route::post('/referance/store', [ReferanceController::class, 'store']);
Route::post('/referance/{id}/update', [ReferanceController::class, 'update']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::post('/category/{id}/update', [CategoryController::class, 'update']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blog/{id}', [BlogController::class, 'edit']);
Route::post('/blog/store', [BlogController::class, 'store']);
Route::post('/blog/{id}/update', [BlogController::class, 'update']);

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/{id}', [ProjectController::class, 'edit']);
Route::post('/project/store', [ProjectController::class, 'store']);
Route::post('/project/{id}/update', [ProjectController::class, 'update']);


});
