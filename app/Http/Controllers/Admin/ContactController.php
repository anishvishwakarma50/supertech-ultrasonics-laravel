<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of all contacts with search and filter functionality
     */
    public function index(Request $request)
    {
        $query = Contact::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
        }

        // Filter by read/unread
        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status === 'unread') {
                $query->where('is_read', false);
            } elseif ($status === 'read') {
                $query->where('is_read', true);
            }
        }

        $contacts = $query->orderByDesc('created_at')->paginate(15);

        return view('admin.contact.index', [
            'contacts' => $contacts,
            'search' => $request->input('search') ?? '',
            'status' => $request->input('status') ?? 'all',
        ]);
    }

    /**
     * Display the specified contact
     */
    public function show(Contact $contact)
    {
        // Mark as read when viewed
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return view('admin.contact.show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Delete the specified contact
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contact.index')
                        ->with('success', 'Contact deleted successfully.');
    }

    /**
     * Mark contact as read
     */
    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);

        return redirect()->back()
                        ->with('success', 'Contact marked as read.');
    }

    /**
     * Mark contact as unread
     */
    public function markAsUnread(Contact $contact)
    {
        $contact->update(['is_read' => false]);

        return redirect()->back()
                        ->with('success', 'Contact marked as unread.');
    }

    /**
     * Delete all contacts
     */
    public function deleteAll(Request $request)
    {
        Contact::truncate();

        return redirect()->route('admin.contact.index')
                        ->with('success', 'All contacts have been deleted.');
    }
}
