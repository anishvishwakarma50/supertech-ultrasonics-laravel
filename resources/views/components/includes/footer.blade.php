<footer>
    <div class="footer-top-area black-2-bg">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="footer-icon">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        @if($siteData && $siteData->youtube_url)
                            <a href="{{ $siteData->youtube_url }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if($siteData && $siteData->instagram_url)
                            <a href="{{ $siteData->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($siteData && $siteData->linkedin_url)
                            <a href="{{ $siteData->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 d-md-none d-lg-block">
                    <div class="footer-top-link text-center">
                        <ul>
                            <li><a href="#">Setting & Privacy</a></li>
                            <li><a href="#">erms of Use</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-logo text-center text-md-right">
                        <a href="index-2.html"><img src="{{ asset('assets/img/logo/Super Tech.svg') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="footer-widget-area pt-75 pb-30" style="background-image:url({{ asset('assets/img/bg/footer.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-wrapper mb-30">
                        <h3 class="footer-title">About Company</h3>
                        <div class="footer-text">
                            @if($siteData && $siteData->about_company)
                                <p>{!! Str::limit($siteData->about_company, 150) !!}</p>
                            @else
                                <p>No information available at this time.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-wrapper pl-25 mb-30">
                        <h3 class="footer-title">Quick Links</h3>
                        <div class="footer-link">
                            <ul>
                                <li><a href="{{ route('about') }}">About Company</a></li>
                                <li><a href="{{ route('products') }}">Our Products</a></li>
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="footer-wrapper mb-30 pl-40">
                        <h3 class="footer-title">Contact Us</h3>
                        <ul class="footer-info">
                            @if($siteData && $siteData->address)
                                <li><span><i class="far fa-map-marker-alt"></i> {{ $siteData->address }}</span></li>
                            @endif
                            @if($siteData && $siteData->email)
                                <li><span><i class="far fa-envelope-open"></i> <a href="mailto:{{ $siteData->email }}">{{ $siteData->email }}</a></span></li>
                            @endif
                            @if($siteData && $siteData->contact_details)
                                <li><span><i class="far fa-phone"></i> {{ $siteData->contact_details }}</span></li>
                            @endif
                            @if($siteData && $siteData->contact_number_2)
                                <li><span><i class="far fa-phone"></i> {{ $siteData->contact_number_2 }}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area black-2-bg footer-bottom-bg mt-50">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="copyright text-center">
                            <p>Copyright <i class="far fa-copyright"></i> 2026 <a href="#">Supertech Ultrasonics</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>