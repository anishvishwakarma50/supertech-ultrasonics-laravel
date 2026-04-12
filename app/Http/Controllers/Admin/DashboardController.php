<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Inquiry;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with real data
     */
    public function index()
    {
        // Get counts
        $totalProducts = Product::count();
        $totalIndustries = Industry::count();
        $totalInquiries = Inquiry::count();
        $totalTestimonials = Testimonial::count();
        $totalLeads = Lead::count();

        // Products created today
        $productsToday = Product::whereDate('created_at', now()->toDateString())->count();

        // Get recent products (last 7 added)
        $recentProducts = Product::orderByDesc('created_at')->limit(7)->get();

        // Get recent inquiries (last 10)
        $recentInquiries = Inquiry::with(['product', 'lead'])->orderByDesc('created_at')->limit(10)->get();

        // Get products created this month
        $productsThisMonth = Product::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Get inquiries created this month
        $inquiriesThisMonth = Inquiry::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Get count by date for chart (last 7 days)
        $chartData = $this->getChartData();

        return view('admin.index', [
            'totalProducts' => $totalProducts,
            'totalIndustries' => $totalIndustries,
            'totalInquiries' => $totalInquiries,
            'totalTestimonials' => $totalTestimonials,
            'totalLeads' => $totalLeads,
            'productsToday' => $productsToday,
            'productsThisMonth' => $productsThisMonth,
            'inquiriesThisMonth' => $inquiriesThisMonth,
            'recentProducts' => $recentProducts,
            'recentInquiries' => $recentInquiries,
            'chartData' => $chartData,
        ]);
    }

    /**
     * Get chart data for the last 7 days
     */
    private function getChartData()
    {
        $labels = [];
        $productData = [];
        $inquiryData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $labels[] = now()->subDays($i)->format('M d');

            $productCount = Product::whereDate('created_at', $date)->count();
            $inquiryCount = Inquiry::whereDate('created_at', $date)->count();

            $productData[] = $productCount;
            $inquiryData[] = $inquiryCount;
        }

        return [
            'labels' => $labels,
            'productData' => $productData,
            'inquiryData' => $inquiryData,
        ];
    }
}
