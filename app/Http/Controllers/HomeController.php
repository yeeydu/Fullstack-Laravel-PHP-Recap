<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    

    // public function slider(){

    //   $sliders = Slider::where('is_active','1')->get();
    //   $testimonials =Testimonial::where('is_active','1')->orderBy('id', 'desc')->paginate(10);
    //   $fotografias = Fotografia::where('is_active','1')->orderBy('order', 'desc')->paginate(6);
    //   return view('index', ['sliders' => $sliders, 'fotografias' => $fotografias, 'testimonials' => $testimonials, 'shareComponent' => $shareComponent]); // Homepage with Carousel
    // }


}
 