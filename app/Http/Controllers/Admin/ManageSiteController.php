<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManageSiteController extends Controller
{
    public function index()
    {
        $siteData = SiteContent::first();
        return view('admin.manage_site_content', ['siteData' => $siteData]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_history' => 'required|string',
            'what_we_do' => 'required|string',
            'about_company' => 'nullable|string',
            'contact_details' => 'nullable|string',
            'contact_number_2' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'logo' => 'nullable|mimes:jpeg,svg,png,jpg,gif|max:2048',
        ]);

        $siteContent = SiteContent::first();

        // Sanitize HTML content
        $data = [
            'company_history' => $this->sanitizeHtml($request->company_history),
            'what_we_do' => $this->sanitizeHtml($request->what_we_do),
            'about_company' => $this->sanitizeHtml($request->about_company),
            'contact_details' => $request->contact_details,
            'contact_number_2' => $request->contact_number_2,
            'email' => $request->email,
            'address' => $request->address,
            'linkedin_url' => $request->linkedin_url,
            'youtube_url' => $request->youtube_url,
            'instagram_url' => $request->instagram_url,
        ];

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($siteContent && $siteContent->logo) {
                Storage::disk('public')->delete($siteContent->logo);
            }
            // Store new logo
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }

        if ($siteContent) {
            $siteContent->update($data);
        } else {
            SiteContent::create($data);
        }

        return redirect()->route('manage-content')->with('status', 'Site content updated successfully!');
    }

    /**
     * Sanitize HTML content from CKEditor
     * Allows safe tags like p, br, b, i, u, h1-h6, ul, ol, li, img, a, strong, em
     */
    private function sanitizeHtml($html)
    {
        if (!$html) return null;

        $allowed_tags = [
            'p', 'br', 'b', 'i', 'u', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
            'ul', 'ol', 'li', 'img', 'a', 'strong', 'em', 'span',
            'blockquote', 'figure', 'figcaption'
        ];

        // Create allowed tags string
        $allowed = '<' . implode('><', $allowed_tags) . '>';

        // Strip tags not in allowed list
        return strip_tags($html, $allowed);
    }
}

