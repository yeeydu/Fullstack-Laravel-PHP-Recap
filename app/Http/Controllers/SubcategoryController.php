<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.subcategories.index', ['subcategories' => $subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.subcategories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'parent_id' => 'required',
        ]);


        $categories = Category::where('id',$request->category_id)->first();

        $subcategory = new Subcategory();
        $subcategory->title = $request->title;
        $subcategory->slug = $request->slug;
        $subcategory->description = $request->description;
        $subcategory->parent_id = $request->parent_id;
        $subcategory->save();

        return redirect('admin/subcategories')->with('msg', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        return view('admin.pages.subcategories.show', ['subcategory' => $subcategory]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.pages.subcategories.edit', ['subcategory' => $subcategory, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'parent_id' => 'required',
        ]);

        $subcategory = Subcategory::find($subcategory->id);
        $subcategory->title = $request->title;
        $subcategory->slug = $request->slug;
        $subcategory->description = $request->description;
        $subcategory->parent_id = $request->parent_id;
        $subcategory->save();

        return redirect('admin/subcategories')->with('msg', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory = Subcategory::find($subcategory->id);
        $subcategory->delete();

        return redirect('admin/subcategories')->with('msg', 'Item deleted successfully');
    }
}
