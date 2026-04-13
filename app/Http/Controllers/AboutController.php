<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use App\Models\Industry;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $siteData = SiteContent::first();
        $industries = Industry::all();
        return view('about', ['siteData' => $siteData, 'industries' => $industries]);
    }
}
