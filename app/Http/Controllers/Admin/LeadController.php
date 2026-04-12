<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of leads with search functionality
     */
    public function index(Request $request)
    {
        $query = Lead::with(['inquiries']);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('company_name', 'like', "%{$search}%")
                  ->orWhere('contact_person_name', 'like', "%{$search}%")
                  ->orWhere('phone_no', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
        }

        $leads = $query->orderByDesc('created_at')->paginate(15);

        return view('admin.lead.index', [
            'leads' => $leads,
            'search' => $request->input('search') ?? '',
        ]);
    }

    /**
     * Display the specified lead with all its inquiries
     */
    public function show(Lead $lead)
    {
        $lead->load(['inquiries.product', 'inquiries']);
        
        return view('admin.lead.show', [
            'lead' => $lead,
            'inquiries' => $lead->inquiries()->with(['product'])->orderByDesc('created_at')->get(),
        ]);
    }
}
