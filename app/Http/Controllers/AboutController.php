<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use App\Models\Industry;
use App\Models\PageSeo;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $siteData = SiteContent::first();
        $industries = Industry::all();
        $pageSeo = PageSeo::where('page_name', 'about')->first();
        return view('about', ['siteData' => $siteData, 'industries' => $industries, 'seo' => $pageSeo]);
    }
}
