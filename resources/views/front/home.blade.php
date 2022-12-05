<x-front-layout>


    <!-- Utilize Cart Menu End -->

    <!-- Utilize Mobile Menu Start -->
    <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <div class="site-logo">
                    <a href="index.html"><img src="{{asset('front/img/logo.png')}}" alt="Logo"></a>
                </div>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="ltn__utilize-menu-search-form">
                <form action="#">
                    <input type="text" placeholder="Search...">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="ltn__utilize-menu">
                <ul>
                    <li><a href="#">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home Pages 01</a></li>
                            <li><a href="index-2.html">Home Pages 02</a></li>
                            <li><a href="index-3.html">Home Pages 03</a></li>
                            <li><a href="index-4.html">Home Pages 04</a></li>
                            <li><a href="index-5.html">Home Pages 05</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="service.html">Services</a></li>
                            <li><a href="service-details.html">Service Details</a></li>
                            <li><a href="portfolio.html">Portfolio</a></li>
                            <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            <li><a href="team.html">Team</a></li>
                            <li><a href="team-details.html">Team Details</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="locations.html">Google Map Locations</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shop</a>
                        <ul class="sub-menu">
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="shop-grid.html">Shop Grid</a></li>
                            <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                            <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                            <li><a href="product-details.html">Shop details </a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="order-tracking.html">Order Tracking</a></li>
                            <li><a href="account.html">My Account</a></li>
                            <li><a href="login.html">Sign in</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul>
                    </li>
                    <li><a href="#">News</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">News</a></li>
                            <li><a href="blog-grid.html">News Grid</a></li>
                            <li><a href="blog-left-sidebar.html">News Left sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">News Right sidebar</a></li>
                            <li><a href="blog-details.html">News details</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="service.html">Services</a></li>
                            <li><a href="service-details.html">Service Details</a></li>
                            <li><a href="portfolio.html">Portfolio</a></li>
                            <li><a href="portfolio-2.html">Portfolio - 02</a></li>
                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                            <li><a href="team.html">Team</a></li>
                            <li><a href="team-details.html">Team Details</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="history.html">History</a></li>
                            <li><a href="contact.html">Appointment</a></li>
                            <li><a href="locations.html">Google Map Locations</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
                <ul>
                    <li>
                        <a href="account.html" title="My Account">
                            <span class="utilize-btn-icon">
                                <i class="far fa-user"></i>
                            </span>
                            My Account
                        </a>
                    </li>
                    <li>
                        <a href="wishlist.html" title="Wishlist">
                            <span class="utilize-btn-icon">
                                <i class="far fa-heart"></i>
                                <sup>3</sup>
                            </span>
                            Wishlist
                        </a>
                    </li>
                    <li>
                        <a href="cart.html" title="Shoping Cart">
                            <span class="utilize-btn-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <sup>5</sup>
                            </span>
                            Shoping Cart
                        </a>
                    </li>
                </ul>
            </div>
            <div class="ltn__social-media-2">
                <ul>
                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Utilize Mobile Menu End -->

    <div class="ltn__utilize-overlay"></div>

    <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-3  section-bg-1">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
            <!-- ltn__slide-item -->
            @php
               $sliders = App\Models\Slider::get();
            @endphp
            @foreach ($sliders as $slider)

            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <div class="slide-video mb-50 d-none">
                                            <a class="ltn__video-icon-2 ltn__video-icon-2-border" href="https://www.youtube.com/embed/tlThdr3O5Qo" data-rel="lightcase:myCollection">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                        <h6 class="slide-sub-title animated"><img src="{{asset('front/img/icons/icon-img/1.png')}}" alt="#"> منتجات أصلية 100٪</h6>
                                        <h1 class="slide-title animated ">{{$slider->title}}</h1>
                                        <div class="slide-brief animated d-none">
                                            <p>{{$slider->description}}</p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="{{route('shop')}}" class="theme-btn-1 btn btn-effect-1 text-uppercase">اكتشف المنتجات</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-item-img">
                                    <img src="{{asset('storage/' . $slider->image_slide)}}" alt="#">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- BANNER AREA START -->
    <div class="ltn__banner-area mt-120 mt--90 d-none">
        <div class="container">
            <div class="row ltn__custom-gutter--- justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{asset('front/img/banner/1.jpg')}}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{asset('front/img/banner/2.jpg')}}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{asset('front/img/banner/1.jpg')}}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER AREA END -->

    <!-- BANNER AREA START -->
    <div class="ltn__banner-area mt-120">
        <div class="container">
            <div class="row ltn__custom-gutter--- justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="ltn__banner-item">
                        <div class="ltn__banner-img">
                            <a href="shop.html"><img src="{{asset('front/img/banner/13.png')}}" alt="Banner Image"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ltn__banner-item">
                                <div class="ltn__banner-img">
                                    <a href="shop.html"><img src="{{asset('front/img/banner/14.png')}}" alt="Banner Image"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="ltn__banner-item">
                                <div class="ltn__banner-img">
                                    <a href="shop.html"><img src="{{asset('front/img/banner/15.png')}}" alt="Banner Image"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BANNER AREA END -->

    <!-- PRODUCT TAB AREA START (product-item-3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-85 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">{{__('front.منتجاتنا')}}</h1>
                    </div>
                    <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">

                    @foreach ($productloops as $productloop)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">

                        <div class="ltn__product-item ltn__product-item-3 text-left">
                            <div class="product-img">

                                <a href="product-details.html"><img src="{{$productloop->image_url}}" alt="#" loading="lazy"></a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge">New</li>
                                    </ul>
                                </div>
                                <div class="product-hover-action">
                                    <ul>
                                        <li>

                                            <a href="{{route('favourites.store')}}" onclick="event.preventDefault(); document.getElementById('wish').submit()" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                <i class="far fa-heart"></i></a>

                                    </li>
                                        <form action="{{route('favourites.store')}}" id="wish" method="post" style="display:none">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{$productloop->id}}">
                                    </form>


                                    </ul>
                                </div>

                            </div>
                            <div class="product-info">
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h2 class="product-title"><a href="{{route('front.products.show',$productloop->slug)}}">{{$productloop->name}}</a></h2>
                                <div class="product-price">

                                    <span>{{Currency::format($productloop->price)}}</span>
                                    @if ($productloop->compare_price)
                                    <del>{{Currency::format($productloop->compare_price)}}</del>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB AREA END -->

    <!-- COUNTDOWN AREA START -->
    <div class="ltn__call-to-action-area ltn__call-to-action-4 section-bg-1 pt-110 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="{{asset('front/img/banner/11.png')}}" alt="#">
                </div>
                <div class="col-lg-7">
                    <div class="call-to-action-inner call-to-action-inner-4 text-color-white--- text-center---">
                        <div class="section-title-area ltn__section-title-2 text-center---">
                            <h6 class="ltn__secondary-color">اليوم عروض ساخنة</h6>
                            <h1 class="section-title">العسل الأصلي <br>  باقة الكومبو</h1>
                        </div>
                        <div class="ltn__countdown ltn__countdown-3 bg-white--" data-countdown="2021/06/25"></div>
                        <div class="btn-wrapper animated">
                            <a href="shop.html" class="theme-btn-1 btn btn-effect-1 text-uppercase">تسوق الآن</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COUNTDOWN AREA END -->

    <!-- PRODUCT AREA START (product-item-3) -->
    <div class="ltn__product-area ltn__product-gutter pt-115 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h1 class="section-title">{{__('front.منتجات مميزة')}}</h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
                <!-- ltn__product-item -->
                @foreach ($products as $product)

                <x-product-card :product="$product" />

                @endforeach
                <!--  -->
            </div>
        </div>
    </div>
    <!-- PRODUCT AREA END -->

    <!-- VIDEO AREA START -->

    <!-- VIDEO AREA END -->

    <!-- TESTIMONIAL AREA START (testimonial-4) -->
    <div class="ltn__testimonial-area section-bg-1 pt-90 pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color">//  اراء العملاء</h6>
                        <h1 class="section-title">اراء عملائنا <span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">

                @php
                $testemnials = App\Models\Testemonial::get();
             @endphp
                @foreach ($testemnials as $testemnial)

                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="{{asset('storage/' . $testemnial->image_testemonial)}}" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>{{$testemnial->description}} </p>
                            <h4>{{$testemnial->title}}</h4>
                            <h6>{{$testemnial->sub_title}}</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>

                @endforeach


                <!--  -->
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

    <!-- BLOG AREA START (blog-3) -->

    <!-- BLOG AREA END -->

    <!-- FEATURE AREA START ( Feature - 3) -->
    <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-8">
                                    <div class="ltn__feature-icon">
                                        <img src="{{asset('front/img/icons/icon-img/11.png')}}" alt="#">
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h4>المنتجات المنسقة</h4>
                                        <p>تقديم منتجات منسقة لجميع المنتجات التي تزيد قيمتها عن 100 دولار</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-8">
                                    <div class="ltn__feature-icon">
                                        <img src="{{asset('front/img/icons/icon-img/12.png')}}" alt="#">
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h4>صنع يدوي</h4>
                                        <p>نحن نضمن جودة المنتج الذي هو هدفنا الرئيسي</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-8">
                                    <div class="ltn__feature-icon">
                                        <img src="{{asset('front/img/icons/icon-img/13.png')}}" alt="#">
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h4>منتج طبيعى</h4>
                                        <p>قم بإرجاع المنتج خلال 3 أيام لأي منتج تشتريه</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-12">
                                <div class="ltn__feature-item ltn__feature-item-8">
                                    <div class="ltn__feature-icon">
                                        <img src="{{asset('front/img/icons/icon-img/14.png')}}" alt="#">
                                    </div>
                                    <div class="ltn__feature-info">
                                        <h4>توصيل مجاني للمنزل</h4>
                                        <p>نحن نضمن جودة المنتج التي يمكنك الوثوق بها بسهولة</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-front-layout>
