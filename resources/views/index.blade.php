<x-layout.app title="Super Tech Ultrasonic" :seo="$seo">
    <x-slot:content>
        <main>
            <!-- slider start -->
            <div class="hero-slider-area">
                <div id="rs_slider_wrapper_02" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home-02"
                    data-source="gallery"
                    style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                    <!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
                    <div id="rs_slider_02" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
                        <ul>
                            @forelse($sliders as $index => $slider)
                            <!-- SLIDE {{ $index + 1 }} -->
                            <li data-index="rs-{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}" data-transition="random" data-slotamount="default" data-hideafterloop="0"
                                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default"
                                data-thumb="{{ Storage::url($slider->image) }}" data-rotate="0" data-saveperformance="off"
                                data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                                data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="{{ Storage::url($slider->image) }}" alt="{{ $slider->heading }}" data-bgposition="center center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption rev_group" id="rs-layer-01-{{ $index }}" data-x="['left','left','left','left']"
                                    data-hoffset="['370','80','97','20']" data-y="['top','top','top','top']"
                                    data-voffset="['250','220','226','200']" data-width="['800', '800', '800', '800']"
                                    data-height="['220','220','220','100']" data-whitespace="nowrap" data-type="group" data-responsive_offset="on"
                                    data-frames='[{"delay":10,"speed":1500,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 6; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #222; letter-spacing: 0px;">

                                    <div class="tp-caption" id="rs-layer-03-{{ $index }}" data-x="['left','left','left','left']"
                                        data-hoffset="['-10','-10','-10','-10']" data-y="['middle','middle','middle','middle']"
                                        data-voffset="['-100','-90','-90','-100']" data-width="none" data-height="none"
                                        data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-start="800"
                                        data-frames='[{"delay":"+0","speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                        data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                                        data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                                        data-paddingtop="[5,5,5,5]" data-paddingright="[10,10,10,10]" data-paddingbottom="[5,5,5,5]"
                                        data-paddingleft="[10,10,10,10]" data-fontsize="['16', '17', '17', '16']"
                                        data-lineheight="['26', '26', '26', '26']"
                                        style="z-index: 9; white-space: nowrap; font-size: 16px; line-height: 30px; color: #fff;font-family:'Roboto', sans-serif;font-weight: 700;text-transform: uppercase;border-radius: 5px;">
                                        {{ $slider->{'sub-heading'} }}
                                    </div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption NotGeneric-Title  tp-resizeme" id="rs-layer-02-{{ $index }}"
                                        data-x="['left','left','left','left']" data-hoffset="['-2','-2','-2','-2']"
                                        data-y="['middle','middle','middle','middle']" data-voffset="['30','20','10','-20']"
                                        data-width="['850', '820', '600', '400']" data-height="none" data-whitespace="normal"
                                        data-type="text" data-responsive_offset="on"
                                        data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                        data-transform_out="s:700;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="500" data-splitin="none"
                                        data-splitout="none" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]"
                                        data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                        data-fontsize="['75', '60', '50', '40']" data-lineheight="['85', '80', '65', '50']"
                                        style="z-index: 7;white-space: normal; font-size: 75px; line-height: 60px; font-weight: 700; color: #fff; letter-spacing: 0px;font-family:'Roboto', sans-serif;">
                                        {{ $slider->heading }}
                                    </div>
                                    <!-- LAYER NR. 3 -->
                                </div>
                                <!-- LAYER NR. 1 -->

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption  " id="rs-layer-04-{{ $index }}" data-x="['left','left','left','left']"
                                    data-hoffset="['375','80','101','20']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['130','100','100','40']" data-width="450" data-height="none"
                                    data-whitespace="normal" data-type="text" data-responsive_offset="on" data-responsive="off"
                                    data-frames='[{"delay":10,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                    style="z-index: 5; white-space: normal; font-size: 20px; line-height: 22px; font-weight: 400; color: #444; letter-spacing: 0px;font-family:'Roboto', sans-serif;">
                                    <div class="bd-slider-button">
                                        <a class="b-btn" href="#"> <span>get started</span></a>
                                    </div>
                                </div>
                            </li>
                            @empty
                            <!-- SLIDE 01 - Default Fallback -->
                            <li data-index="rs-01" data-transition="random" data-slotamount="default" data-hideafterloop="0"
                                data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default"
                                data-thumb="assets/img/slider/slider1.jpg" data-rotate="0" data-saveperformance="off"
                                data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                                data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                <!-- MAIN IMAGE -->
                                <img src="assets/img/slider/slider1.jpg" alt="" data-bgposition="center center" data-bgfit="cover"
                                    data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 1 -->
                                <div class="tp-caption rev_group" id="rs-layer-01" data-x="['left','left','left','left']"
                                    data-hoffset="['370','80','97','20']" data-y="['top','top','top','top']"
                                    data-voffset="['250','220','226','200']" data-width="['800', '800', '800', '800']"
                                    data-height="['220','220','220','100']" data-whitespace="nowrap" data-type="group" data-responsive_offset="on"
                                    data-frames='[{"delay":10,"speed":1500,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                                    data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"
                                    style="z-index: 6; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #222; letter-spacing: 0px;">

                                    <div class="tp-caption" id="rs-layer-03" data-x="['left','left','left','left']"
                                        data-hoffset="['-10','-10','-10','-10']" data-y="['middle','middle','middle','middle']"
                                        data-voffset="['-100','-90','-90','-100']" data-width="none" data-height="none"
                                        data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-start="800"
                                        data-frames='[{"delay":"+0","speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                        data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                                        data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                                        data-paddingtop="[5,5,5,5]" data-paddingright="[10,10,10,10]" data-paddingbottom="[5,5,5,5]"
                                        data-paddingleft="[10,10,10,10]" data-fontsize="['16', '17', '17', '16']"
                                        data-lineheight="['26', '26', '26', '26']"
                                        style="z-index: 9; white-space: nowrap; font-size: 16px; line-height: 30px; color: #fff;font-family:'Roboto', sans-serif;font-weight: 700;text-transform: uppercase;border-radius: 5px;">
                                        25 years of experience we provide services
                                    </div>

                                    <!-- LAYER NR. 2 -->
                                    <div class="tp-caption NotGeneric-Title  tp-resizeme" id="rs-layer-02"
                                        data-x="['left','left','left','left']" data-hoffset="['-2','-2','-2','-2']"
                                        data-y="['middle','middle','middle','middle']" data-voffset="['30','20','10','-20']"
                                        data-width="['850', '820', '600', '400']" data-height="none" data-whitespace="normal"
                                        data-type="text" data-responsive_offset="on"
                                        data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                                        data-transform_out="s:700;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                                        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="500" data-splitin="none"
                                        data-splitout="none" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]"
                                        data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                        data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                        data-fontsize="['75', '60', '50', '40']" data-lineheight="['85', '80', '65', '50']"
                                        style="z-index: 7;white-space: normal; font-size: 75px; line-height: 60px; font-weight: 700; color: #fff; letter-spacing: 0px;font-family:'Roboto', sans-serif;">
                                        Ultrasonic Cleaning
                                        Machine
                                    </div>
                                    <!-- LAYER NR. 3 -->
                                </div>
                                <!-- LAYER NR. 1 -->

                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption  " id="rs-layer-04" data-x="['left','left','left','left']"
                                    data-hoffset="['375','80','101','20']" data-y="['middle','middle','middle','middle']"
                                    data-voffset="['130','100','100','40']" data-width="450" data-height="none"
                                    data-whitespace="normal" data-type="text" data-responsive_offset="on" data-responsive="off"
                                    data-frames='[{"delay":10,"speed":1500,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                    style="z-index: 5; white-space: normal; font-size: 20px; line-height: 22px; font-weight: 400; color: #444; letter-spacing: 0px;font-family:'Roboto', sans-serif;">
                                    <div class="bd-slider-button">
                                        <a class="b-btn" href="#"> <span>get started</span></a>
                                        <a class="btn-text-b ml-20" href="#"> our services</a>
                                    </div>
                                </div>
                            </li>
                            @endforelse
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                    </div>
                </div>
            </div>
            <!-- slider end -->

            <!-- history-area-start -->
            <div class="history-area pt-130 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5">
                            <div class="single-history mb-30">
                                <div class="history-text">
                                    <span>who we are</span>
                                    <h1>Innovation Meets <br>Excellence</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7">
                            <div class="history-wrapper mb-30">
                                <div class="history-content">
                                    <h4>Company History</h4>
                                    @if($siteData && $siteData->company_history)
                                        <div id="historyText" class="truncate-text">{!! Str::limit($siteData->company_history, 300, '') !!}</div>
                                        @if(strlen($siteData->company_history) > 300)
                                            <button class="btn btn-link p-0 text-primary" data-toggle="modal" data-target="#historyModal">
                                                ...more <i class="dripicons-arrow-thin-right"></i>
                                            </button>
                                        @endif
                                    @else
                                        <p class="text-muted">Company history not available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- history-area-end -->

            <!-- Modal for Full History -->
            <div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="historyModalLabel">Company History</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if($siteData && $siteData->company_history)
                                <div>{!! $siteData->company_history !!}</div>
                            @else
                                <p class="text-muted">Company history not available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- blog-area-start -->
            <div class="blog-area pt-125 pb-100" style="background-image:url(assets/img/bg/test.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                            <div class="section-title text-center mb-75">
                                <span>Products</span>
                                <h1>Ultrasonic cleaners Manufacturers & Suppliers</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- here i stopped after creating component of product-card --}}
                        @foreach ($products as $product)
                            <x-product-card :$product />
                        @endforeach
                        
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-4">
                            <div class="blog-wrapper mb-30 d-flex flex-end">
                                <a href="blog-details.html" style="background-color:#ff9514;" class="btn text-black btn-rounded m-2">
                                    <span class="text-dark">More Products</span> 
                                    <i class="dripicons-arrow-thin-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- blog-area-end -->

            <!-- latest-services-area-start -->
            <div class="latest-services-area pt-125 pb-130">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                            <div class="section-title text-center mb-75">
                                <span>what we do</span>
                                <h1>Latest Services</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row services-1-active arrow-style">
                        <div class="col-xl-12">
                            <div class="latest-services-wrapper pos-rel">
                                <div class="latest-services-img">
                                    <img src="assets/img/machines/Single_Chember.png" style="width:51rem;" alt="">
                                </div>
                                <div class="latest-services-text">
                                    <h3>Ultrasonic Cleaning Machine Manufacturers</h3>
                                    @if($siteData && $siteData->what_we_do)
                                        <div class="truncate-text">{!! Str::limit($siteData->what_we_do, 300, '') !!}</div>
                                        @if(strlen($siteData->what_we_do) > 300)
                                            <button class="btn btn-link p-0 text-primary" data-toggle="modal" data-target="#servicesModal">
                                                ...more <i class="dripicons-arrow-thin-right"></i>
                                            </button>
                                        @endif
                                    @else
                                        <p class="text-muted">Services description not available</p>
                                    @endif
                                    <a class="b-btn btn-white" href="#"> <span>view details</span>  </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- latest-services-area-end -->

            <!-- Modal for Full Services Content -->
            <div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="servicesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="servicesModalLabel">Our Services</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @if($siteData && $siteData->what_we_do)
                                <div>{!! $siteData->what_we_do !!}</div>
                            @else
                                <p class="text-muted">Services description not available</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- cta start  -->
            <div class="cta-area pt-100 pb-70" style="background-image:url(assets/img/bg/cta.jpg)">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-lg-8">
                            <div class="cta-text mb-30">
                                <span>work your dream project</span>
                                <h1>Need Premium Quality Services</h1>
                                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the
                                charms of pleasure of the moment blinded</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <div class="cta-button text-lg-right mb-30">
                                <a class="b-btn" href="#">
                                    <span>join with us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- cta end  -->

            <!-- features-area-start -->
            <x-industry-card :$industries />
            <!-- features-area-end -->

            <!-- testimonial-6-area -->
            <x-testimonial :$testimonials/>
            <!-- testimonial-6-area end -->

        </main>
    </x-slot:content>
</x-layout.app>