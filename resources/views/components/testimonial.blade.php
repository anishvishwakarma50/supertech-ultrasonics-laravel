{{-- Capture Testimonials Prop --}}
@props(['testimonials'])
<div class="testimonial-6-area gray-bg pt-140 pb-140 fix" style="background-image:url(assets/img/bg/test.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                <div class="section-title text-center mb-75">
                    <span>what our clients say</span>
                    <h1>Clients Testimonials</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="testimonial-nav mb-30">
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-thumb">
                            <img src="assets/img/testimonial/img1.png" alt="">
                        </div>                        
                    @endforeach
                </div>
                <div class="testimonia-item-active test-3-dot">
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-item text-center">
                            <p>{{ $testimonial->comment }}</p>
                            <div class="designation mb-30">
                                <h3>{{ $testimonial->name }}</h3>
                                <span>{{ $testimonial->designation }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>