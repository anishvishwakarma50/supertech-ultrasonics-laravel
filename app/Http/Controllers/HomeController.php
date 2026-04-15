<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use App\Models\Inquiry;
use App\Models\Lead;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SiteContent;
use App\Models\Specification;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\PageSeo;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // lets just put some data into products table
    public function index() {
        // $product = Product::create(
        //     [
        //         'title' => 'Table Top Ultrasonic Cleaner',
        //         'description' => 'Grab Yours now - the Table Top Ultrasonic Cleaner is your crowning solution for superior industrial cleaning.',
        //         'moq' => '1',
        //         'specification_id' => 1
        //     ]
        // );

        // dump($product);

        // $spec = Specifications::create([
        //     'usage' => 'Industrial',
        //     'material' => 'SS',
        //     'weight' => 200,
        //     'voltage' => 240,
        //     'color' => 'Silver',
        //     'frequency' => '40 Kilohertz ( KHZ )',
        //     'temperature' => 60
        // ]);
        // dump($spec);
        
        // question 1
        // $product = Product::get();

        // question 2
        // $product = Product::where('moq', '1')
        // ->get();

        // Product::where('moq','1')
        // ->update(['moq'=> '5', 'description' => 'This is Testing for knowledge of mine']);
        
        // question 3
        // $product = Product::where('moq', '5')
        // ->delete();
        // dd($product);

        // insert data to images table
        // ProductImage::create(
        //     [
        //         'image_path' => '/upload/public/sample2',
        //         'position' => 2,
        //         'product_id' => 1
        //     ]
        // );

        // fetch images of product
        // $product = Product::find(1);

        // dd($product->specification);

        // Lead::create([
        //     'company_name' => 'ABC',
        //     'contact_person_name' => 'Rajesh',
        //     'phone_no' => '9898989898',
        //     'location' => 'Mumbai'
        // ]);

        // $new_lead = Lead::find(1);

        // dd($new_lead);

        // $new_inquiry = Inquiry::create([
        //     'description' => 'Now i want 6000 machines in 300 days for 5000 cr.',
        //     'lead_id' => 1,
        //     'product_id' => 1
        // ]);

        // dd($new_inquiry);

        // dd($new_lead->Inquiries);


        // let's work with factory
        // $testimonial = Testimonial::Factory()->create();
        
        // $testi_date = Testimonial::get();
        // dd($testi_date);
        
        // SiteContent::factory()->create();
        // $site_data = SiteContent::get();
        // dd($site_data);

        // Slider::factory()->create();
        // $slider_data = Slider::get();
        // dd($slider_data);
        
        // Industry::factory()->create();
        // $industry_data = Industry::get();
        // dd($industry_data);
        
        // Lead::factory()->create();
        // $lead_data = lead::get();
        // dd($lead_data);
        
        // Specification::factory()->create();
        // $spec_data = Specification::get();
        // dd($spec_data);
        
        // $product_data = Product::factory()
        // ->hasSpecification(5)
        // ->hasImages(5)
        // ->create();
        
        // $product_data = Product::factory()
        // ->for(Specification::factory())
        // ->has(ProductImage::factory(5), 'images')
        // ->create();
        
        // $product_data_created = Product::with(['specification', 'images'])->get();
        // dd( $product_data_created);

        // Inquiry::factory()
        // ->for(Lead::factory())
        // ->for(Product::factory()
        //     ->for(Specification::factory()))
        // ->create();

        // // Fetch created data
        // $pd = Inquiry::with(['lead','product'])->get();
        // dd($pd);

        // Product::factory()
        // ->count(5)
        // ->has(ProductImage::factory()
        // ->sequence(fn(Sequence $sequence) => ['position' => $sequence->index % 5 + 1])
        // ,'images')
        // ->for(Specification::factory())
        // ->create();

        // product to pass it to view
        $products = Product::limit(4)->get();
        // dd($products);
        $testimonials = Testimonial::limit(10)->get();
        // dd($testimonials);
        $industries = Industry::get();
        // dd($industries);

        // Site Content Data
        $siteData = SiteContent::first();

        // Fetch Sliders Data
        $sliders = Slider::orderByDesc('created_at')->limit(5)->get();

        // Fetch SEO Data for Home Page
        $pageSeo = PageSeo::where('page_name', 'home')->first();

        return view('index', ['products' => $products, 'testimonials' => $testimonials, 'industries' => $industries, 'siteData' => $siteData, 'sliders' => $sliders, 'seo' => $pageSeo]);
    }
}
