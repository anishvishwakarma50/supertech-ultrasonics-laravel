{{-- Capture passed data --}}
@props(['product'])

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
    {{-- 1. h-100 and d-flex flex-column ensure all cards in a row stretch to the same height --}}
    <div class="blog-wrapper h-100 d-flex flex-column shadow-sm bg-white">
        <div class="blog-img">
            <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}">
                @if($product->primaryImage && $product->primaryImage->image_path)
                    {{-- 2. Fixed height + object-fit: cover ensures images never distort or break the layout --}}
                    <img src="{{ Storage::url($product->primaryImage->image_path) }}" alt="{{ $product->title }}" class="img-fluid w-100" style="height: 220px; object-fit: contain;">
                @else
                    <img src="assets/img/machines/solar-cell-cleaning-machine.jpg" alt="{{ $product->title }}" class="img-fluid w-100" style="height: 220px; object-fit: contain;">
                @endif
            </a>
        </div>
        
        {{-- 3. flex-grow-1 allows the text area to expand, pushing the buttons down --}}
        <div class="blog-text d-flex flex-column flex-grow-1 p-3">
            
            {{-- 4. SEO-Friendly Truncation: CSS Line-Clamp limits visual lines but keeps full text for Google bots --}}
            <h4 class="mb-3" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                {{-- Added title attribute so users can hover to see the full name if truncated --}}
                <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}" title="{{ $product->title }}">
                    {{ $product->title }}
                </a>
            </h4>
            
            {{-- 5. mt-auto pushes the buttons to the absolute bottom of the card uniformly --}}
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-2 mt-auto">
                <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}" class="btn btn-info btn-rounded w-100 text-center">
                    <span class="text-white">Read More</span> 
                    <i class="dripicons-arrow-thin-right"></i>
                </a>
                <a href="{{ route('product-details', [$product->id, Str::slug($product->title)]) }}" style="background-color:#ff9514;" class="btn btn-rounded w-100 text-center">
                    <span class="text-dark">Enquiry Now</span> 
                    <i class="dripicons-arrow-thin-right text-dark"></i>
                </a>
            </div>
        </div>
    </div>
</div>