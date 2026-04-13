<header>
    <div class="header-top-area header-border d-none d-md-block pl-55 pr-55">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-9 col-md-9 d-flex align-items-center">
                    <div class="header-info">
                        <span class="mail-header-icon"><i class="far fa-clock"></i> Mon - Sat: 9:00 - 19:00 / Closed on Sunday</span>
                        @if($siteData && $siteData->contact_details)
                            <span class="mail-header-icon"><i class="far fa-phone"></i> {{ $siteData->contact_details }}</span>
                        @else
                            <span class="mail-header-icon"><i class="far fa-phone"></i> Contact us for more info</span>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-3">
                    <div class="header-top-right f-right ">
                        <div class="header-icon f-right d-none d-xl-block">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            @if($siteData && $siteData->linkedin_url)
                                <a href="{{ $siteData->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            @endif
                            @if($siteData && $siteData->instagram_url)
                                <a href="{{ $siteData->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if($siteData && $siteData->youtube_url)
                                <a href="{{ $siteData->youtube_url }}" target="_blank"><i class="fab fa-youtube"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sticky-header" class="main-menu-area pl-55 pr-55">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3 d-flex align-items-center">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo/Super Tech.svg') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="main-menu text-center">
                        <nav id="mobile-menu">
                            <ul>
                                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('products') }}">Products</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-2 d-none d-lg-block">
                    <div class="header-right">
                        <div class="header-right-info home1-right-info f-right d-none d-xl-block">
                            <div class="heder-right-icon f-left">
                                <img src="{{ asset('assets/img/icon/phone.png') }}" alt="">
                            </div>
                            <div class="header-right-text">
                                <a class="btn" href="#"> <span>Get a Quote</span></a>
                            </div>
                        </div>
                        <div class="menu-bar f-right">
                            <a class="info-bar" href="javascript:void(0);"><i class="fal fa-bars"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="extra-info">
        <div class="close-icon">
            <button>
                <i class="far fa-window-close"></i>
            </button>
        </div>
        <div class="logo-side mb-30">
            <a href="index-2.html">
                <img src="{{ asset('assets/img/logo/white.png') }}" alt="" />
            </a>
        </div>
        <div class="side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                @if($siteData && $siteData->address)
                    <p>{{ $siteData->address }}</p>
                @else
                    <p>Address not available</p>
                @endif
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                @if($siteData && $siteData->contact_details)
                    <p>{{ $siteData->contact_details }}</p>
                @endif
                @if($siteData && $siteData->contact_number_2)
                    <p>{{ $siteData->contact_number_2 }}</p>
                @endif
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                @if($siteData && $siteData->email)
                    <p><a href="mailto:{{ $siteData->email }}">{{ $siteData->email }}</a></p>
                @else
                    <p>Email not available</p>
                @endif
            </div>
        </div>
        <div class="social-icon-right mt-20">
            <a href="#">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
                <i class="fab fa-google-plus-g"></i>
            </a>
            <a href="#">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>
</header>