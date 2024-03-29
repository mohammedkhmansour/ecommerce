
<div class="col-lg-3 col-md-4 col-sm-6 col-6">
    <div class="ltn__product-item ltn__product-item-3 text-left">
        <div class="product-img">

            <a href="product-details.html"><img src="{{$product->image_url}}" alt="#" loading="lazy"></a>
            <div class="product-badge">
                <ul>
                    <li class="sale-badge">New</li>
                </ul>
            </div>
            <div class="product-hover-action">
                <ul>
                    {{-- <li>
                        <a href="#" title="Quick View" data-toggle="modal" data-target="#quick_view_modal">
                            <i class="far fa-eye"></i>
                        </a>
                    </li>
                    <li>

                        <a href="#" title="Add to Cart" data-toggle="modal" data-target="#add_to_cart_modal">
                            <i class="fas fa-shopping-cart"></i>
                        </a>

                    </li> --}}
                    <li>

                        <a href="{{route('favourites.store')}}" onclick="event.preventDefault(); document.getElementById('wish').submit()" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                            <i class="far fa-heart"></i></a>

                </li>
                    <form action="{{route('favourites.store')}}" id="wish" method="post" style="display:none">
                    @csrf

                    <input type="hidden" name="product_id" value="{{$product->id}}">
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
            <h2 class="product-title"><a href="{{route('front.products.show',$product->slug)}}">{{$product->name}}</a></h2>
            <div class="product-price">

                <span>{{Currency::format($product->price)}}</span>
                @if ($product->compare_price)
                <del>{{Currency::format($product->compare_price)}}</del>
                @endif
            </div>
        </div>
    </div>
</div>

    <!-- MODAL AREA START (Quick View Modal) -->
    {{-- <div class="ltn__modal-area ltn__quick-view-modal-area">
        <div class="modal fade" id="quick_view_modal" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <!-- <i class="fas fa-times"></i> -->
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-img">
                                            <img src="{{$product->image_url}}" alt="#">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="modal-product-info">
                                            <div class="product-ratting">
                                                <ul>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                                    <li><a href="#"><i class="far fa-star"></i></a></li>
                                                    <li class="review-total"> <a href="#"> ( 95 Reviews )</a></li>
                                                </ul>
                                            </div>
                                            <h2 class="product-title"><a href="{{route('front.products.show',$product->slug)}}">{{$product->name}}</a></h2>
                                            <div class="product-price">

                                                <span>{{Currency::format($product->price)}}</span>
                                                @if ($product->compare_price)
                                                <del>{{Currency::format($product->compare_price)}}</del>
                                                @endif
                                            </div>
                                            <div class="ltn__product-details-menu-2">
                                                <form action="{{ route('cart.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <ul>
                                                    <li>
                                                        <div class="cart-plus-minus">
                                                            <input type="text" value="02" name="quantity" class="cart-plus-minus-box">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <button type="submit">
                                                            <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" >
                                                                <i class="fas fa-shopping-cart"></i>
                                                                <span>اضف الى السلة</span>
                                                            </a>
                                                        </button>
                                                    </li>
                                                </ul>
                                                </form>
                                            </div>
                                            <div class="ltn__product-details-menu-3">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                                                            <i class="far fa-heart"></i>
                                                            <span>Add to Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="" title="Compare" data-toggle="modal" data-target="#quick_view_modal">
                                                            <i class="fas fa-exchange-alt"></i>
                                                            <span>Compare</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <hr>
                                            <div class="ltn__social-media">
                                                <ul>
                                                    <li>Share:</li>
                                                    <li><a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="#" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                                    <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Add To Cart Modal) -->
    {{-- <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="{{$product->image_url}}" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="{{route('front.products.show',$product->slug)}}">{{$product->name}}</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  تمت الاضافة بنجاح</p>
                                            <div class="btn-wrapper">
                                                <a href="{{route('cart.index')}}" class="theme-btn-1 btn btn-effect-1">شاهد السلة </a>
                                                <a href="checkout.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none---">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use (LoveBroccoli) discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- MODAL AREA END -->

    <!-- MODAL AREA START (Wishlist Modal) -->
    {{-- <div class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <div class="ltn__quick-view-modal-inner">
                             <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img src="img/product/7.png" alt="#">
                                        </div>
                                         <div class="modal-product-info">
                                            <h5><a href="product-details.html">Vegetables Juices</a></h5>
                                            <p class="added-cart"><i class="fa fa-check-circle"></i>  Successfully added to your Wishlist</p>
                                            <div class="btn-wrapper">
                                                <a href="wishlist.html" class="theme-btn-1 btn btn-effect-1">View Wishlist</a>
                                            </div>
                                         </div>
                                         <!-- additional-info -->
                                         <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order, <br>  Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#">
                                            </div>
                                         </div>
                                    </div>
                                </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- MODAL AREA END -->
