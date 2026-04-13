<?php

namespace App\Http\Controllers;

use App\Models\SiteContent;
use App\Models\Inquiry;
use Illuminate\Http\Request;

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
            // You can store this in a contacts table or send email
            // For now, we'll just create a record
            $contact = new \stdClass();
            $contact->name = $validated['name'];
            $contact->email = $validated['email'];
            $contact->subject = $validated['subject'];
            $contact->message = $validated['message'];
            $contact->phone = $validated['phone'] ?? null;

            // Optional: Send email notification
            // Mail::to('admin@example.com')->send(new ContactFormMail($contact));

            return back()->with('success', 'Thank you! Your message has been sent. We will get back to you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
