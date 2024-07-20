<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
         $slider = Slider::where('status',1)->first();
        return view('frontend.index',compact('slider'));
    }
}
