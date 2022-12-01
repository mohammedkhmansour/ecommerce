<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OredersManegmentController extends Controller
{
    public function OrderPending()
    {
        // $orders = OrderItem::with('order')->orderBy('id','DESC')->get();
        // return view('dashboard.orders.pending_order',compact('orders'));

        if(Gate::denies('order.pending')){
            abort(403);
        }
         $orders = Order::with('orderItems')->where('status','pending')->orderBy('id','DESC')->get();

        // return $orders;

         return view('dashboard.orders.pending_order',compact('orders'));

    }

    public function OrderProcessing()
    {
        if(Gate::denies('order.rocessing')){
            abort(403);
        }
        $orders = Order::with('orderItems')->where('status','processing')->orderBy('id','DESC')->get();
        return view('dashboard.orders.processing_order',compact('orders'));
    }

    public function OrderCompleted()
    {

        if(Gate::denies('order.completed')){
            abort(403);
        }
        $orders = Order::with('orderItems')->where('status','completed')->orderBy('id','DESC')->get();
        return view('dashboard.orders.completed_order',compact('orders'));
    }

    public function OrderDetails($id)
    {
        if(Gate::denies('order.details')){
            abort(403);
        }

        $order = Order::with('orderItems')->findOrFail($id);
        return view('dashboard.orders.order_details',compact('order'));
    }

    public function PendingToprocessing($id)
    {

        if(Gate::denies('order.PendingToprocessing')){
            abort(403);
        }
        $order = Order::findOrFail($id)->update(['status'=>'processing']);
        flash()->addSuccess('تم التعديل بنجاح');
        return redirect()->route('order.processing');

    }

    public function ProcessingTocompleted($id)
    {

        if(Gate::denies('order.ProcessingTocompleted')){
            abort(403);
        }
        $order = Order::findOrFail($id)->update(['status'=>'completed']);
        flash()->addSuccess('تم التعديل بنجاح');
        return redirect()->route('order.processing');
    }

    // public function UserOrder()
    // {
    //     $user = Auth::user();
    //     // $orders = OrderItem::with('order')->orderBy('id','DESC')->get();
    //     $orders = Order::where('user_id',$user->id)->orderBy('id','DESC')->get();
    //     return view('front.clint-profile.account',compact('orders'));

    // }
    public function destroy($id)
    {

        if(Gate::denies('order.destroy')){
            abort(403);
        }
        $orders = Order::with('orderItems')->findOrFail($id);
        $orders->delete();

        flash()->addError('تم الحذف بنجاح');

        return redirect()->route('order.completed');
    }

}
