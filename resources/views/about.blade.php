<x-layout.app title="About Us - Super Tech Ultrasonic" :seo="$seo">
    <x-slot:content>
        <main>
            <!-- Page Title Start -->
            <div class="page-title-area" style="background-image: url({{ asset('assets/img/bg/page-title.jpg') }});">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page-title text-center">
                                <h1>About Our Company</h1>
                                <p>Learn more about our journey and mission</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Title End -->

            <!-- About Content Start -->
            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2">
                        <div class="about-content">
                            <h2 class="mb-4">Who We Are</h2>
                            @if($siteData && $siteData->about_company)
                                <div class="mb-4">{!! $siteData->about_company !!}</div>
                            @else
                                <p class="text-muted mb-4">Company information not available at this time. Please check back later.</p>
                            @endif

                            <hr class="my-5">

                            <h2 class="mb-4">Our History</h2>
                            @if($siteData && $siteData->company_history)
                                <p class="mb-4">{!! $siteData->company_history !!}</p>
                            @else
                                <p class="text-muted mb-4">Company history not available at this time.</p>
                            @endif

                            <hr class="my-5">

                            <h2 class="mb-4">What We Do</h2>
                            @if($siteData && $siteData->what_we_do)
                                <p class="mb-4">{!! $siteData->what_we_do !!}</p>
                            @else
                                <p class="text-muted mb-4">Services information not available at this time.</p>
                            @endif

                            <div class="mt-5 pt-5">
                                <a href="{{ route('contact') }}" class="b-btn">Get In Touch</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Content End -->

        </main>
    </x-slot:content>
</x-layout.app>
