<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Lead;
use App\Models\Product;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person_name' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // Find or create lead
        $lead = Lead::firstOrCreate([
            'company_name' => $request->company_name,
            'contact_person_name' => $request->contact_person_name,
            'phone_no' => $request->phone_no,
            'location' => $request->location,
        ]);

        // Create inquiry
        Inquiry::create([
            'description' => $request->description ?? 'Product inquiry from website',
            'lead_id' => $lead->id,
            'product_id' => $productId,
        ]);

        return back()->with('success', 'Your inquiry has been submitted successfully. We will contact you soon!');
    }
}