{{-- {{ dd($product_data) }} --}}
<x-layout.app title="{{ $product_data->title }}">
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
        <script>
            $(document).ready(function() {
                // Handle thumbnail active state
                $('.thumb-row img').on('click', function() {
                    $('.thumb-row img').removeClass('active-thumb');
                    $(this).addClass('active-thumb');
                });

                // Update thumbnail active state when carousel slides via arrows
                $('#productCarousel').on('slide.bs.carousel', function (e) {
                    var id = e.to;
                    $('.thumb-row img').removeClass('active-thumb');
                    $('.thumb-row img[data-slide-to="' + id + '"]').addClass('active-thumb');
                });
            });
        </script>
        <!-- breadcrumb-area-start -->
        <div class="container">
            <div class="breadcrumb-text text-center">
                <h1>blog details</h1>
                <ul class="breadcrumb-menu">
                    <li><a href="index-2.html">home</a></li>
                    <li><span>blog details</span></li>
                </ul>
            </div>
        </div>
        <!-- breadcrumb-area-end -->
        <!-- blog-area start -->
        <div class="blog-area pt-40 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <article class="postbox post format-image mb-40">
                            <x-product-carausel :images="$product_data->images" />

                            <h3 class="product-title mb-10">{{ $product_data->title }}</h3>
                            <div class="postbox__text bg-none">
                                <div class="post-meta mb-15">
                                    <span><i class="far fa-calendar-check"></i> September 15, 2018 </span>
                                    <span><a href="#"><i class="far fa-user"></i> Diboli B. Joly</a></span>
                                    <span><a href="#"><i class="far fa-comments"></i> 23 Comments</a></span>
                                </div>
                                <div class="post-text mb-20">
                                    <p>{{ $product_data->description }}</p>
                                </div>
                                <div class="row mt-50">
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
                                </div>
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
                    <div class="col-lg-4">
                        <!-- <div class="widget mb-40">
                            <div class="widget-title-box mb-30">
                                <h3 class="widget-title">Search Objects</h3>
                            </div>
                            <form class="search-form">
                                <input type="text" placeholder="Search your keyword...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget mb-40">
                            <div class="widget-title-box mb-30">
                                <h3 class="widget-title">Popular Feeds</h3>
                            </div>
                            <ul class="recent-posts">
                                <li>
                                    <div class="widget-posts-image">
                                        <a href="#"><img src="assets/img/blog/sm-01.html" alt=""></a>
                                    </div>
                                    <div class="widget-posts-body">
                                        <h6 class="widget-posts-title"><a href="#">How Frontend Developers Can Help To Bridge</a></h6>
                                        <div class="widget-posts-meta">October 18, 2018 </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="widget-posts-image">
                                        <a href="#"><img src="assets/img/blog/sm-02.html" alt=""></a>
                                    </div>
                                    <div class="widget-posts-body">
                                        <h6 class="widget-posts-title"><a href="#">Everything You Need To Know About Transa</a></h6>
                                        <div class="widget-posts-meta">january 24, 2018 </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="widget-posts-image">
                                        <a href="#"><img src="assets/img/blog/sm-03.html" alt=""></a>
                                    </div>
                                    <div class="widget-posts-body">
                                        <h6 class="widget-posts-title"><a href="#">How Frontend Developers Can Help To Bridge</a></h6>
                                        <div class="widget-posts-meta">October 28, 2018 </div>
                                    </div>
                                </li>
                            </ul>
                        </div> -->
                        {{-- Specification --}}
                        <x-product-specification :specification="$product_data->specification" />
                        <div class="widget mb-40">
                            <div class="widget-title-box mb-30">
                                <h3 class="widget-title">Social Profile</h3>
                            </div>
                            <div class="social-profile">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="widget mb-40">
                            <div class="widget-title-box mb-30">
                                <h3 class="widget-title">Instagram Feeds</h3>
                            </div>
                            <div class="tag">
                                <a href="#">Popular</a>
                                <a href="#">desgin</a>
                                <a href="#">usability</a>
                                <a href="#">develop</a>
                                <a href="#">consult</a>
                                <a href="#">icon</a>
                                <a href="#">HTML</a>
                                <a href="#">ux</a>
                                <a href="#">business</a>
                                <a href="#">kit</a>
                                <a href="#">keyboard</a>
                                <a href="#">tech</a>
                            </div>
                        </div>
                        <div class="widget mb-40 p-0 b-0">
                            <div class="banner-widget">
                                <a href="#"><img src="{{ asset('assets/img/blog/banner.html') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area end -->
    </x-slot:content>
</x-layout.app>