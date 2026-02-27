{{-- Capture Industry Prop --}}
@props(['industries'])
<div class="features-areaa pb-100 pt-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 offset-lg-3 offset-xl-3">
                <div class="section-title text-center mb-75">
                    <span>Industries</span>
                    <h1>Industries We Work With</h1>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($industries as $industry)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="features-wrapper mb-30">
                        <div class="features-img">
                            {{-- <img src="{{ $industry->image }}" alt=""> --}}
                            <img src="assets/img/features/01.jpg" alt="">
                            <div class="features-text">
                                <h3><a href="#">{{ $industry->heading }}</a></h3>
                                <a href="#">learn more <i class="far fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>