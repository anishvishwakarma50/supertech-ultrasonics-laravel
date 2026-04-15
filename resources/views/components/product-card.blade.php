{{-- Capture passed data --}}
@props(['product'])

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
    <div class="blog-wrapper mb-30">
        <div class="blog-img">
            <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}">
                @if($product->primaryImage && $product->primaryImage->image_path)
                    <img src="{{ Storage::url($product->primaryImage->image_path) }}" alt="{{ $product->title }}" class="img-fluid">
                @else
                    <img src="assets/img/machines/solar-cell-cleaning-machine.jpg" alt="{{ $product->title }}" class="img-fluid">
                @endif
            </a>
        </div>
        <div class="blog-text">
            <h4><a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}">{{ $product->title }}</a></h4>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-2 mt-3">
                <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}" class="btn btn-info btn-rounded">
                    <span class="text-white">Read More</span> 
                    <i class="dripicons-arrow-thin-right"></i>
                </a>
                <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}" style="background-color:#ff9514;" class="btn text-black btn-rounded">
                    <span class="text-dark">Enquiry Now</span> 
                    <i class="dripicons-arrow-thin-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>