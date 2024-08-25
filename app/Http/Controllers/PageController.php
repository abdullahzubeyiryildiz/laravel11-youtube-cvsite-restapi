<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
         $slider = Slider::where('status',1)->first();

          $categories = Category::where('status',1)->get();
         $about = About::first();
        return view('frontend.index',compact('slider','about','categories'));
    }
}
