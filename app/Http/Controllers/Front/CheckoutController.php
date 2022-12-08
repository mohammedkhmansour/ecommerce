<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Notifications\NewOrderNotifcation;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Intl\Countries;
use Throwable;

class CheckoutController extends Controller
{

    public function create(CartRepository $cart)
    {
        if ($cart->get()->count() == 0) {
            return redirect()->route('home');
        }

        return view('front.checkout', [
            'cart' => $cart,
            'countries' => Countries::getNames(),
        ]);

    }

        public function store(Request $request , CartRepository $cart)
        {

            $request->validate([
            ]);

            DB::beginTransaction();
            try {

            $order = Order::create([
                'user_id' => Auth::id(),
                'payment_method' => 'cod',
                'first_name'     => $request->post('first_name'),
                'last_name'     => $request->post('last_name'),
                'email'     => $request->post('email'),
                'phone_number'     => $request->post('phone_number'),
                'street_address'     => $request->post('street_address'),
                'country'     => $request->post('country'),
                'city'     => $request->post('city'),
                'postal_code'     => $request->post('postal_code'),
                'state'     => $request->post('state'),
                'total'     => $cart->total(),

            ]);

            foreach($cart->get() as $item){
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                ]);
            }

            $cart->empty();
            DB::commit();


            event('order.created',$order);

    $user = User::where('type','<>','admin')->first();
    $user->notify(new NewOrderNotifcation($order));

        } catch (Throwable $e) {


            DB::rollBack();
            throw $e;
        }

    // return redirect()->route('home');
    return redirect()->route('payments.create', $order->id);


    }

}
