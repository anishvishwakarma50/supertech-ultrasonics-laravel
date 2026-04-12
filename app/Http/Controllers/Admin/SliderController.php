<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderByDesc('created_at')->get();
        return view("admin.slider.index", ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.slider.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'sub-heading' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['heading', 'sub-heading']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sliders', 'public');
            $data['image'] = $imagePath;
        }

        Slider::create($data);

        return redirect()->route('slider.index')->with('status', 'Slider added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view("admin.slider.show", ['slider' => $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view("admin.slider.edit", ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'sub-heading' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['heading', 'sub-heading']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($slider->image && \Storage::disk('public')->exists($slider->image)) {
                \Storage::disk('public')->delete($slider->image);
            }
            $imagePath = $request->file('image')->store('sliders', 'public');
            $data['image'] = $imagePath;
        }

        $slider->update($data);

        return redirect()->route('slider.index')->with('status', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        // Delete image if exists
        if ($slider->image && \Storage::disk('public')->exists($slider->image)) {
            \Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()
            ->route('slider.index')
            ->with('status', 'Slider deleted successfully');
    }
}
