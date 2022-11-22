<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// use App\Notifications\NewOrderNotifcation;
// use App\Models\User;


class QuantityDecrement
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($order)
    {
        foreach($order->products as $product){
            $product->decrement('quantity',$product->order_item->quantity);
        }

        // if($product->order_item->quantity < 5){
        //     $user = User::where('type','<>','admin')->first();
        //     $user->notify(new NewOrderNotifcation($order));
        // }
    }
}
