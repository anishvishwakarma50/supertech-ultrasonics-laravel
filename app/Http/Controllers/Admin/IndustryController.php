<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $industries = Industry::orderByDesc('created_at')->get();
        return view("admin.industry.index", ['industries' => $industries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.industry.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['heading']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('industries', 'public');
            $data['image'] = $imagePath;
        }

        Industry::create($data);

        return redirect()->route('industry.index')->with('status', 'Industry added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Industry $industry)
    {
        return view("admin.industry.show", ['industry' => $industry]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Industry $industry)
    {
        return view("admin.industry.edit", ['industry' => $industry]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['heading']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($industry->image && \Storage::disk('public')->exists($industry->image)) {
                \Storage::disk('public')->delete($industry->image);
            }
            $imagePath = $request->file('image')->store('industries', 'public');
            $data['image'] = $imagePath;
        }

        $industry->update($data);

        return redirect()->route('industry.index')->with('status', 'Industry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Industry $industry)
    {
        // Delete image if exists
        if ($industry->image && \Storage::disk('public')->exists($industry->image)) {
            \Storage::disk('public')->delete($industry->image);
        }

        $industry->delete();

        return redirect()
            ->route('industry.index')
            ->with('status', 'Industry deleted successfully');
    }
}
