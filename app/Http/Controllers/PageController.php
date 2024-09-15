<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\About;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Category;
use App\Models\SiteSetting;
use Illuminate\Http\Request;


class PageController extends Controller
{
    public function index(){
         $slider = Slider::where('status',1)->first();

         $categories = Category::where('status',1)->get();
         $about = About::first();

         $skills = Tag::where('status',1)->paginate(6);

         $projects = Project::where('status',1)->orderBy('id','desc')->limit(4)->get();

         $blogs = Blog::where('status',1)->orderBy('id','desc')->limit(4)->get();

          $setting = SiteSetting::pluck('setting_value','setting_key')->toArray();
         return view('frontend.index',compact('slider','about','categories','skills','projects','blogs','setting'));
    }
}
