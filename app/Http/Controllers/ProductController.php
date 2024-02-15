<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function  __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);
        $prod_images = Product_image::all();
        return view('admin.pages.products.index', ['products' => $products, 'prod_images' => $prod_images]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.pages.products.create', ['subcategories' => $subcategories, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'summary' => 'required|string',
            'description' => 'required|string',
            'brand' => 'required|string',
            'color' => 'required|string',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            // 'is_active' => 'boolean',
            'images.*'  => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust as needed
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->summary = $request->summary;
        $product->description = $request->description;
        $product->brand = $request->brand;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->is_active = $request->has('is_active') ? true : false;
        $product->save(); // save it first to get the id and then pass it to the image

        foreach ($request->file('images') as $image) {

            $productImage = new Product_image();
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('/images/products/' . $product->id, $imageName, 'public');
            $productImage->url = $path;
            $productImage->product_id = $product->id;
            $productImage->save();
        }
        $product->save();

        return redirect('admin/products')->with('msg', 'item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
