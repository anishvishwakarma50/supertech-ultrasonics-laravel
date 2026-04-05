<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::limit(10)->get();
        // dd($testimonials);
        return view('admin.testimonial.index', ['testimonials' => $testimonials]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
            'designation' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = null;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'designation' => $request->designation,
            'image_path' => $path
        ]);

        return redirect()->route('testimonial.index')->with('status', 'Testimonial added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.show', ['testimonial' => $testimonial]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', ['testimonial' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'comment' => $request->comment,
            'designation' => $request->designation,
        ];

        // Handle image upload
        if($request->hasFile('image')){
            $path = $request->file('image')->store('testimonials', 'public');
            $data['image_path'] = $path;
        }

        $testimonial->update($data);

        return redirect()->route('testimonial.index')->with('status', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete testimonial
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->delete();

        return redirect()
            ->route('testimonial.index')
            ->with('status','Testimonial deleted successfully');
    }
}
