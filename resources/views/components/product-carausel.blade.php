{{-- this is product carousel --}}
{{-- Capturing Props --}}
@props(['images'])
<div class="product-gallery mb-35">
    <div id="productCarousel" class="carousel slide" data-ride="false">
        <div class="carousel-inner shadow-sm rounded">
            @foreach ($images as $image)
                <div class="carousel-item {{ ($image->position == 1) ? 'active' : '' }}">
                    <img src="{{ $image->image_path }}" class="d-block w-100" alt="portfolio Front">
                </div>
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row gx-2 mt-3 justify-content-center thumb-row">
        @foreach ($images as $image)
            <div class="col-2">
                <img src="{{ $image->image_path }}" class="img-thumbnail {{ ($image->position == 1) ? 'active-thumb' : '' }} shadow-sm" data-target="#productCarousel" data-slide-to="0">
            </div>
        @endforeach
    </div>
</div>