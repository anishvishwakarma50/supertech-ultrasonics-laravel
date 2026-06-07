{{-- {{ dd($product_data) }} --}}
<x-layout.app title="{{ $product_data->title }}" :seo="$product_data->seo">
    <x-slot:content>
        <style>
            #productCarousel .carousel-item img {
                height: 450px; /* Adjust based on your preference */
                width: 100%;
                object-fit: contain;
                background-color: #ffffff;
                border: 1px solid #eee;
            }
            .thumb-row .img-thumbnail {
                height: 80px;
                width: 100%;
                object-fit: cover;
                cursor: pointer;
                border: 2px solid transparent;
            }
            .thumb-row .active-thumb {
                border-color: #ff9900 !important;
            }
            .carousel-control-prev-icon, .carousel-control-next-icon {
                background-color: rgba(0,0,0,0.2);
                border-radius: 50%;
                padding: 20px;
            }
        </style>
        
        <!-- breadcrumb-area-start -->
        {{-- <div class="container">
            <div class="breadcrumb-text text-center">
                <h1>blog details</h1>
                <ul class="breadcrumb-menu">
                    <li><a href="index-2.html">home</a></li>
                    <li><span>blog details</span></li>
                </ul>
            </div>
        </div> --}}
        <!-- breadcrumb-area-end -->
        <!-- blog-area start -->
        <div class="blog-area pt-40 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 px-2">
                        <article class="postbox post format-image mb-40">
                            <x-product-carausel :images="$product_data->images" />

                            <h3 class="product-title mb-10">{{ $product_data->title }}</h3>
                            <div class="postbox__text bg-none">
                                {{-- <div class="post-meta mb-15">
                                    <span><i class="far fa-calendar-check"></i> September 15, 2018 </span>
                                    <span><a href="#"><i class="far fa-user"></i> Diboli B. Joly</a></span>
                                    <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                </div> --}}
                                <div class="post-text mb-20 product-description">
                                    <div>{!! $product_data->description !!}</div>
                                </div>
                                {{-- <div class="row mt-50">
                                    <div class="col-xl-8 col-lg-8 col-md-8 mb-15">
                                        <div class="blog-post-tag">
                                            <span>Releted Tags</span>
                                            <a href="#">organic</a>
                                            <a href="#">Foods</a>
                                            <a href="#">tasty</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 mb-15">
                                        <div class="blog-share-icon text-left text-md-right">
                                            <span>Share: </span>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                            <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- <div class="row">
                                    <div class="col-12">
                                        <div class="navigation-border pt-50 mt-40"></div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="bakix-navigation b-next-post text-left mb-30">
                                            <span><a href="#">Next Post</a></span>
                                            <h4><a href="#">Tips on Minimalist</a></h4>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-2 ">
                                        <div class="bakix-filter text-left text-md-center mb-30">
                                            <a href="#"><i class="fad fa-th"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-lg-5 col-md-5">
                                        <div class="bakix-navigation b-next-post text-left text-md-right  mb-30">
                                            <span><a href="#">Next Post</a></span>
                                            <h4><a href="#">Tips on Minimalist</a></h4>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- <div class="author mt-40 mb-40 fix">
                                <div class="author-img f-left">
                                    <img src="assets/img/blog/author.html" alt="">
                                </div>
                                <div class="author-text fix">
                                    <h3>Nikoas Zakiloa</h3>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui bla
                                        nditiis praesentiuvoluptatum deleniti atque corrupti quos dolores </p>
                                    <div class="author-icon">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-behance-square"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                        <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="post-comments">
                                <div class="blog-coment-title mb-30">
                                    <h2>03 Comments</h2>
                                </div>
                                <div class="latest-comments">
                                    <ul>
                                        <li>
                                            <div class="comments-box">
                                                <div class="comments-avatar">
                                                    <img src="assets/img/blog/comments1.html" alt="">
                                                </div>
                                                <div class="comments-text">
                                                    <div class="avatar-name">
                                                        <h5>Karon Balina</h5>
                                                        <span>19th May 2018</span>
                                                        <a class="reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="children">
                                            <div class="comments-box">
                                                <div class="comments-avatar">
                                                    <img src="assets/img/blog/comments1.html" alt="">
                                                </div>
                                                <div class="comments-text">
                                                    <div class="avatar-name">
                                                        <h5>Julias Roy</h5>
                                                        <span>19th May 2018</span>
                                                        <a class="reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip.</p>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="comments-box">
                                                <div class="comments-avatar">
                                                    <img src="assets/img/blog/comments2.html" alt="">

                                                </div>
                                                <div class="comments-text">
                                                    <div class="avatar-name">
                                                        <h5>Arista Williamson</h5>
                                                        <span>19th May 2018</span>
                                                        <a class="reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                                    </div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt
                                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="post-comments-form">
                                <div class="post-comments-title">
                                    <h2>Inquiry Form</h2>
                                </div>
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form id="contacts-form" class="conatct-post-form" method="POST" action="{{ route('product.inquiry', $product_data->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="contact-icon contacts-message">
                                                <input type="text" name="company_name" placeholder="Company Name" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="contact-icon contacts-name">
                                                <input type="text" name="contact_person_name" placeholder="Contact Person Name" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="contact-icon contacts-phone">
                                                <input type="text" name="phone_no" placeholder="Phone no." required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="contact-icon contacts-location">
                                                <input type="text" name="location" placeholder="Location" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="contact-icon">
                                                <textarea name="description" placeholder="Additional requirements or description" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <button class="b-btn btn-black" type="submit"> <span>Send Inquiry</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area end -->

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Initialize Bootstrap carousel
                const carouselElement = document.getElementById('productCarousel');
                const carousel = new bootstrap.Carousel(carouselElement, {
                    interval: false
                });

                // Handle thumbnail click to slide carousel
                const thumbnails = document.querySelectorAll('.thumb-row img');
                thumbnails.forEach(function(thumbnail) {
                    thumbnail.addEventListener('click', function() {
                        const slideIndex = parseInt(this.getAttribute('data-slide-to'));
                        carousel.to(slideIndex);
                    });
                });

                // Update thumbnail active state when carousel slides
                carouselElement.addEventListener('slid.bs.carousel', function(e) {
                    const nextIndex = e.to;
                    // Remove active-thumb class from all thumbnails
                    thumbnails.forEach(function(thumb) {
                        thumb.classList.remove('active-thumb');
                    });
                    // Add active-thumb class to the current thumbnail
                    const activeThumb = document.querySelector('.thumb-row img[data-slide-to="' + nextIndex + '"]');
                    if (activeThumb) {
                        activeThumb.classList.add('active-thumb');
                    }
                });
            });
        </script>
    </x-slot:content>
</x-layout.app>