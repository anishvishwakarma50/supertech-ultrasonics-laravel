<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inquiries = Inquiry::with(['lead', 'product'])->orderByDesc('created_at')->get();
        return view('admin.inquiry.index', ['inquiries' => $inquiries]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inquiry = Inquiry::with(['lead', 'product'])->findOrFail($id);
        return view('admin.inquiry.show', ['inquiry' => $inquiry]);
    }
}