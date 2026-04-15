<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSeoController extends Controller
{
    /**
     * Display the SEO management page
     */
    public function index()
    {
        $pageSeos = PageSeo::all()->keyBy('page_name');
        $availablePages = PageSeo::availablePages();
        
        return view('admin.page_seo.index', [
            'pageSeos' => $pageSeos,
            'availablePages' => $availablePages
        ]);
    }

    /**
     * Store SEO data for a page
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|in:home,about,products',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'og_title' => 'nullable|string|max:100',
            'og_description' => 'nullable|string|max:160',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'delete_og_image' => 'nullable|boolean',
        ]);

        $pageSeo = PageSeo::where('page_name', $request->page_name)->first() 
                    ?? new PageSeo(['page_name' => $request->page_name]);

        $data = [
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'og_title' => $request->og_title,
            'og_description' => $request->og_description,
        ];

        // Handle OG image deletion
        if ($request->delete_og_image && $pageSeo->og_image) {
            Storage::disk('public')->delete($pageSeo->og_image);
            $data['og_image'] = null;
        }

        // Handle OG image upload
        if ($request->hasFile('og_image')) {
            // Delete old OG image if exists
            if ($pageSeo->og_image) {
                Storage::disk('public')->delete($pageSeo->og_image);
            }
            $ogImagePath = $request->file('og_image')->store('ogimages', 'public');
            $data['og_image'] = $ogImagePath;
        }

        $pageSeo->update($data);
        $pageSeo->save();

        return redirect()->route('manage-seo')->with('status', 'SEO settings updated successfully!');
    }
}
