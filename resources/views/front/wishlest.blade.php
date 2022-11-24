<x-front-layout title="المفضلة">

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image" data-bg="img/bg/9.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h6 class="section-subtitle ltn__secondary-color">//  Welcome to our company</h6>
                            <h1 class="section-title white-color">Wishlist</h1>
                        </div>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Wishlist</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="liton__wishlist-area mb-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping-cart-inner">
                        <div class="shoping-cart-table table-responsive">
                            <table class="table">
                                <!-- <thead>
                                    <th class="cart-product-remove">X</th>
                                    <th class="cart-product-image">Image</th>
                                    <th class="cart-product-info">Title</th>
                                    <th class="cart-product-price">Price</th>
                                    <th class="cart-product-quantity">Quantity</th>
                                    <th class="cart-product-subtotal">Subtotal</th>
                                </thead> -->
                                <tbody>
                                    @foreach ($wish as $product)
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="{{ $product->quantity }}">

                                    <tr>
                                        <td class="cart-product-remove remove-item" data-id="{{ $product->id }}">x</td>
                                        <td class="cart-product-image">
                                            <a href="product-details.html"><img src="{{$product->image_url}}" alt="#"></a>
                                        </td>
                                        <td class="cart-product-info">
                                            <h4><a href="product-details.html">{{$product->name}}</a></h4>
                                        </td>
                                        <td class="cart-product-price">{{Currency::format($product->price)}}</td>
                                        <td class="cart-product-add-cart">
                                            <button type="submit">
                                                <a href="#" class="theme-btn-1 btn btn-effect-1" title="Add to Cart" >
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span>اضف الى السلة</span>
                                                </a>
                                            </button>                                        </td>
                                    </tr>
                                    </form>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WISHLIST AREA START -->

    @push('scripts')
    <script>
        const csrf_token = "{{ csrf_token() }}";
    </script>
        <script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>


        <script>
            (function($) {



$('.remove-item').on('click', function(e) {

let id = $(this).data('id');
$.ajax({
    url: "/favourites/" + id, //data-id
    method: 'delete',
    data: {
        _token: csrf_token
    },
    success: response => {
        $(`#${id}`).remove();
    }
});
});


})(jQuery);
        </script>
    @endpush

</x-front-layout>
