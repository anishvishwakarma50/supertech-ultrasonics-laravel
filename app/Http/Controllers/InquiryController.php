<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Lead;
use App\Models\Product;
use App\Mail\InquiryFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        // Get product details
        $product = Product::findOrFail($productId);

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

        // Send email notification to admin
        $adminEmail = config('mail.admin_email') ?? 'admin@example.com';
        
        try {
            $inquiryData = [
                'company_name' => $request->company_name,
                'contact_person_name' => $request->contact_person_name,
                'phone_no' => $request->phone_no,
                'location' => $request->location,
                'product_name' => $product->title,
                'description' => $request->description ?? null,
            ];

            Mail::to($adminEmail)->send(new InquiryFormMail($inquiryData));
            \Log::info('Inquiry email sent successfully', ['to' => $adminEmail, 'product_id' => $productId]);
        } catch (\Exception $mailException) {
            \Log::error('Failed to send inquiry email', [
                'error' => $mailException->getMessage(),
                'to' => $adminEmail
            ]);
        }

        return back()->with('success', 'Your inquiry has been submitted successfully. We will contact you soon!');
    }
}