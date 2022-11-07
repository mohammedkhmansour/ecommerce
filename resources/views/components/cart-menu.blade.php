<div>
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
            <div class="ltn__utilize-menu-head">
                <span class="ltn__utilize-menu-title">Cart</span>
                <button class="ltn__utilize-close">×</button>
            </div>
            <div class="mini-cart-product-area ltn__scrollbar">
                @foreach ($items as $item)

                <div class="mini-cart-item clearfix">
                    <div class="mini-cart-img">
                        <a href="#"><img src="{{$item->product->image_url}}" alt="Image"></a>
                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
                    </div>
                    <div class="mini-cart-info">
                        <h6><a href="{{route('front.products.show',$item->product->slug)}}">{{$item->product->name}}</a></h6>
                        <span class="mini-cart-quantity">{{ $item->quantity }} x {{ Currency::format($item->product->price) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mini-cart-footer">
                <div class="mini-cart-sub-total">
                    <h5>المجموع: <span>{{ Currency::format($total) }}</span></h5>
                </div>
                <div class="btn-wrapper">
                    <a href="{{route('cart.index')}}" class="theme-btn-1 btn btn-effect-1">اذهب الى السلة </a>
                    <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                </div>
                <p>Free Shipping on All Orders Over $100!</p>
            </div>

        </div>
    </div></div>
