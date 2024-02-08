<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

use function Laravel\Prompts\error;

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
        $pages = $pages->reverse();
        //var_dump($pages); // shows raw info and view content
        //dd($pages); // only shows info
        //dump($pages); // love dump shows info and view content
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

        return redirect('admin/page')->with('msg', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $page = Page::find($id);
        if (!$page) {
            return abort(404);
        }

        return view('admin.pages.pages.show', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $page = Page::find($id);
        if (!$page) {
            return abort(404);
        }

        return view('admin.pages.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);

        $this->validate($request, [
            'title'        => 'required',
            'description'  => 'required',
            'image'        => 'image|mimes:png,jpg,jpeg,svg,gif|max:3000'
        ]);

        $page->title = $request->title;
        $page->description = $request->description;
        $page->is_active = $request->has('is_active');


        if ($request->hasFile('image')) {
            // Delete previous image if it exists
            Storage::deleteDirectory('public/images/pages/' . $page->id);

            // Store new image
            $imagePath = $request->file('image');
            $imageName = $page->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/pages/' . $page->id, $imageName, 'public');
            // Update image path in the database
            $page->image = $path;
        }

        $page->save();

        return redirect('admin/page')->with('msg', 'Item edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        Storage::deleteDirectory('public/images/pages/' . $page->id);
        $page->delete();

        return redirect('admin/page')->with('msg', 'Item deleted succesfully!');
    }
}
