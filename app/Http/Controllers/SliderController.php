<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->paginate(4);
        return view('admin.dashboard', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.sliders.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           // 'is_active' => 'boolean',
            'order' => 'required',
        ]);

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->link = $request->link;
        $slider->is_active = $request->has('is_active') ? 1 : 0;
        $slider->order = $request->order;
        $slider->save();

        if($request->hasFile('image')){
            $imagePath = $request->file('image');
            $imageName = $slider->id . '_' . $slider->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/sliders/'. $slider->id, $imageName, 'public');
            $slider->image = $path;
            $slider->save();
        }

        $slider->image = $request->image;
        return redirect('admin/dashboard')->with('msg', 'Item created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {

        return view('admin.pages.sliders.show', ['slider' => $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.sliders.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
           // 'is_active' => 'boolean',
            'order' => 'required',
        ]);

        $slider = Slider::find($slider->id);
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->link = $request->link;
        $slider->is_active = $request->has('is_active') ? 1 : 0;
        $slider->order = $request->order;
        $slider->save();

        if($request->hasFile('image')){
            Storage::deleteDirectory('public/images/slider/' . $slider->id);

            $imagePath = $request->file('image');
            $imageName = $slider->id . '_' . $slider->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/sliders/'. $slider->id, $imageName, 'public');
            $slider->image = $path;
            $slider->save();
        }

        $slider->image = $request->image;
        return redirect('admin/dashboard')->with('msg', 'Item created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        //
    }
}
