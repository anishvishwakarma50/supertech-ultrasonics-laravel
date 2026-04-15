<x-layout.app title="Products - Super Tech Ultrasonic" :seo="$seo">
    <x-slot:content>
        <main>
            <!-- Page Title Start -->
            <div class="page-title-area" style="background-image: url({{ asset('assets/img/bg/page-title.jpg') }});">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page-title text-center">
                                <h1>Our Products</h1>
                                <p>Ultrasonic Cleaners & Solutions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Title End -->

            <!-- Products Grid Start -->
            <div class="products-area pt-125 pb-100">
                <div class="container">
                    @if($products->count() > 0)
                        <div class="row">
                            @foreach($products as $product)
                                <x-product-card :$product />
                            @endforeach
                        </div>

                        <!-- Pagination Start -->
                        <div class="row mt-5">
                            <div class="col-xl-12">
                                <div class="pagination-area text-center">
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                        <!-- Pagination End -->
                    @else
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="alert alert-info text-center p-5">
                                    <h4>No Products Available</h4>
                                    <p>We're currently updating our product catalog. Please check back soon!</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Products Grid End -->

            <!-- CTA Section Start -->
            <div class="cta-area pt-100 pb-70" style="background-image: url({{ asset('assets/img/bg/cta.jpg') }});">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="cta-text mb-30">
                                <span>interested?</span>
                                <h1>Can't Find What You're Looking For?</h1>
                                <p>Contact us for custom solutions tailored to your specific cleaning needs.</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="cta-button text-lg-right mb-30">
                                <a class="b-btn" href="{{ route('contact') }}">
                                    <span>Contact Us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CTA Section End -->
        </main>
    </x-slot:content>
</x-layout.app>
