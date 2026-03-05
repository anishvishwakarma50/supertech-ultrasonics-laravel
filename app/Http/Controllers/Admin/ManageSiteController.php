<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class ManageSiteController extends Controller
{
    public function index() {
        return view('admin.manage_site_content');
    }

    public function store(Request $request)
{
    $request->validate([
        'company_history' => 'required',
        'what_we_do' => 'required',
    ]);

    $siteContent = SiteContent::first();

    if ($siteContent) {
        $siteContent->update([
            'company_history' => $request->company_history,
            'what_we_do' => $request->what_we_do,
        ]);
    } else {
        SiteContent::create([
            'company_history' => $request->company_history,
            'what_we_do' => $request->what_we_do,
        ]);
    }

    return redirect()->route('manage-content')->with('status', 'Data is updated successfully');
}
}
