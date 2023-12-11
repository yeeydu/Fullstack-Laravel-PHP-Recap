<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $pages = Page::all();
        //var_dump($pages);
        //dd($pages);
        dump($pages); // love dump
        return view('admin.pages.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Page::all();
        return view('admin.pages.pages.create', ['pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
           // 'is_active' => 'boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust as needed
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->description = $request->description;
        $page->image = $request->image;
        $page->is_active = $request->has('is_active') ? true : false;

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $page->title . '_' . date('Y-m-d') . '_' . $image->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/pages/' . $page->id, $imageName, 'public');
            //$image->move(storage_path('app/public'), $imageName);
            $page->image = $path;
        }
        $page->save();

        return redirect('admin/page')->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        //
    }
}
