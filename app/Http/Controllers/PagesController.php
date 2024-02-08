<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Products;
use App\Models\Slider;

class PagesController extends Controller
{

    public function index() // Home
    {
        $home = Page::where('title','Home')->where('is_active','1')->first();
      return view('index', ['home' => $home]);
    }

    public function slider(){
        $sliders = Slider::where('is_active','1')->get();
        return view('index', ['sliders' => $sliders]); // Homepage with Carousel
    }


    public function About()
    {
        $about = Page::where('title','About')->where('is_active','1')->first();
       //$page = Page::where('title','About')->first();
      return view('pages/about', ['about' => $about]);
    }

    public function products()
    {

        $productsPage = Page::where('title','Products')->where('is_active','1')->first();
        // $page = Page::where('title', 'Product')->first();
        // $products = Products::all();
        return view('pages/products', ['productsPage'=> $productsPage ]);
    }

    public function Contact()
    {
        $contact = Page::where('title','Contact')->where('is_active','1')->first();
       //$page = Page::where('title','Contact')->first();
      return view('pages/contact', ['contact' => $contact]);
    }
}
