<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $siteData = SiteContent::first();
        return view('contact', ['siteData' => $siteData]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'phone' => 'nullable|string|max:20',
        ]);

        try {
            // Store contact in database
            $contact = Contact::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'phone' => $validated['phone'] ?? null,
                'is_read' => false,
            ]);

            // Send email notification to admin
            $adminEmail = config('mail.admin_email') ?? 'admin@example.com';
            
            try {
                Mail::to($adminEmail)->send(new ContactFormMail($validated));
                \Log::info('Contact email sent successfully', ['to' => $adminEmail, 'subject' => $validated['subject']]);
            } catch (\Exception $mailException) {
                \Log::error('Failed to send contact email', [
                    'error' => $mailException->getMessage(),
                    'to' => $adminEmail
                ]);
            }

            return back()->with('success', 'Thank you! Your message has been sent. We will get back to you soon.');
        } catch (\Exception $e) {
            \Log::error('Contact form error', ['error' => $e->getMessage()]);
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
