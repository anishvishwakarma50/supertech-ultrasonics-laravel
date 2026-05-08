<?php

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ManageSiteController;
use App\Http\Controllers\Admin\PageSeoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController as ProController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsPageController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.send');
Route::get('/products', [ProductsPageController::class, 'index'])->name('products');
Route::get('/product/{id}/{title}', [ProController::class, 'showProduct'])->name('product-details');
Route::post('/product/{id}/inquiry', [InquiryController::class, 'store'])->name('product.inquiry');

Route::get('/sitemap.xml', function () {

    $sitemap = Sitemap::create()
        ->add(Url::create('/')->setPriority(1.0))
        ->add(Url::create('/about')->setPriority(0.8))
        ->add(Url::create('/contact')->setPriority(0.7))
        ->add(Url::create('/products')->setPriority(0.9));

    $products = Product::all();

    foreach ($products as $product) {
        $sitemap->add(
            Url::create("/product/{$product->id}/" . Str::slug($product->title))
                ->setPriority(0.8)
                ->setLastModificationDate($product->updated_at)
        );
    }

    return $sitemap->toResponse(request());
});

//#################################################################
// admin routes
//#################################################################

// Auth Route (public)
Route::get('/admin/login', function () {
    return view('admin.auth.login');
})->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

// Protected Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    // dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // add-product
    Route::get('/add-product', function (){
        return view('admin.product.create');
    });

    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Product Route
    Route::resource('product', ProductController::class);

    // Industry Resource Route
    Route::resource('industry', IndustryController::class);

    // Manage Site Content Route
    Route::get('/manage-content', [ManageSiteController::class, 'index'])->name('manage-content');
    // Store Site Content
    Route::post('/manage-content/store', [ManageSiteController::class, 'store'])->name('store-content');

    // Manage Page SEO Routes
    Route::get('/manage-seo', [PageSeoController::class, 'index'])->name('manage-seo');
    Route::post('/manage-seo/store', [PageSeoController::class, 'store'])->name('store-seo');

    // Testimonial Resource Route
    Route::resource('testimonial', TestimonialController::class);

    // Lead Resource Route
    Route::resource('lead', LeadController::class)->only(['index', 'show']);

    // Slider Resource Route
    Route::resource('slider', SliderController::class);

    // Inquiry Resource Route
    Route::resource('inquiry', \App\Http\Controllers\Admin\InquiryController::class)->only(['index', 'show']);

    // Contact Resource Route
    Route::resource('contact', AdminContactController::class)->only(['index', 'show', 'destroy']);
    Route::post('/contact/{contact}/update-note', [AdminContactController::class, 'updateNote'])->name('contact.update-note');
    Route::post('/contact/{contact}/mark-as-read', [AdminContactController::class, 'markAsRead'])->name('contact.mark-as-read');
    Route::post('/contact/{contact}/mark-as-unread', [AdminContactController::class, 'markAsUnread'])->name('contact.mark-as-unread');
    Route::post('/contact/delete-all', [AdminContactController::class, 'deleteAll'])->name('contact.delete-all');
});