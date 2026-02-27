{{-- Capture passed data --}}
@props(['product'])

<div class="col-xl-3 col-lg-3 col-md-4">
    <div class="blog-wrapper mb-30">
        <div class="blog-img">
            <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}"><img src="assets/img/machines/solar-cell-cleaning-machine.jpg" alt=""></a>
        </div>
        <div class="blog-text">
            <h4><a href="{{ route('product-details', [$product, Str::slug($product->title)]) }}">{{ $product->title }}</a></h4>
            <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}" class="btn btn-info btn-rounded m-2">
                    <span class="text-white">Read More</span> 
                    <i class="dripicons-arrow-thin-right"></i>
                </a>
                <a href="{{ route('product-details', [$product, Str::slug($product->title)]) }}" style="background-color:#ff9514;" class="btn text-black btn-rounded m-2">
                    <span class="text-dark">Enquiry Now</span> 
                    <i class="dripicons-arrow-thin-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>