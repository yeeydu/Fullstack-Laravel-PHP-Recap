<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Slider;

class PagesController extends Controller
{

    public function index() // Home
    {
        $home = Page::where('title', 'Home')->where('is_active', '1')->first();
        $sliders = Slider::where('is_active', '1')->get();

        $products = Product::take(4)->get();
        $images = Product_image::all();

        return view('index', ['home' => $home, 'sliders' => $sliders, 'products' => $products, 'images' => $images]);
    }

    public function slider()
    {
        $sliders = Slider::where('is_active', '1')->get();
        return view('index', ['sliders' => $sliders]); // Homepage with Carousel
    }


    public function About()
    {
        $about = Page::where('title', 'About')->where('is_active', '1')->first();
        return view('pages/about', ['about' => $about]);
    }

    public function products()
    {

        $productsPage = Page::where('title', 'Products')->where('is_active', '1')->first();
        $products = Product::all();
        $images = Product_image::all();
        return view('pages/products', ['productsPage' => $productsPage, 'products' => $products, 'images' => $images]);
    }

    public function product_info($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return abort(404);
        }
        $prod_images = Product_image::all();

        return view('pages/product-info', ['product' => $product, 'prod_images' => $prod_images]);
    }

    public function Contact()
    {
        $contact = Page::where('title', 'Contact')->where('is_active', '1')->first();
        return view('pages/contact', ['contact' => $contact]);
    }
}
