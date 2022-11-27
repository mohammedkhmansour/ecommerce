@extends('layouts.master')
@section('title','الطلبات')

@section('page-title','كل الطلبات')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"> تفاصيل الطلب </li>
@endsection
@section('content')

        <div class="page-content">

            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong> <span class="text-dark"> الدولة :
                                                </span> </strong> {{ $order->country }} </li>
                                        <li class="list-group-item"><strong> <span class="text-dark"> المدينة :
                                                </span> </strong> {{ $order->city }} </li>
                                        <li class="list-group-item"><strong> <span class="text-dark"> الايم الاول
                                                    : </span> </strong> {{ $order->first_name }} </li>
                                                    <li class="list-group-item"><strong> <span class="text-dark"> الاسم الثاني
                                                        : </span> </strong> {{ $order->last_name }} </li>
                                                        <li class="list-group-item"><strong> <span class="text-dark"> البريد الالكتروني
                                                            : </span> </strong> {{ $order->email }} </li>
                                                            <li class="list-group-item"><strong> <span class="text-dark"> رقم الهاتف
                                                                : </span> </strong> {{ $order->phone_number }} </li>

                                        <li class="list-group-item"><strong> <span class="text-dark"> المجموع :
                                                </span> </strong> {{ $order->orderItems->SUM('price') }} </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <form method="post" action="" >
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="list-group">

                                <li class="list-group-item"><strong> <span class="text-dark"> رقم المنتج :
                                        </span> </strong> {{ $order->number }} </li>

                                            <li class="list-group-item"><strong> <span class="text-dark"> حالة الدفع
                                                 : </span> </strong> {{ $order->payment_status }} </li>
                                            <li class="list-group-item"><strong> <span class="text-dark"> نوع
                                                        الدفع : </span> </strong> {{ $order->payment_method }} </li>

                                            <li class="list-group-item"><strong> <span class="text-dark"> تاريخ الطلب :
                                                    </span> </strong> {{ $order->created_at }} </li>
                                            <li class="list-group-item"><strong> <span class="text-dark"> حالة الطلب
                                                        : </span> </strong>
                                                <span class="badge badge-pill"
                                                    style="background: #FF0000;">{{ $order->status }}</span>
                                            </li>
                                            <br>
                                            @if ($order->status == 'pending')
                                                <a href="{{route('order.status.processing',$order->id)}}"
                                                    class="btn btn-block btn-warning"> طلب قيد المعالجة</a>
                                            @elseif($order->status == 'processing')
                                                <a href="{{route('order.status.completed',$order->id)}}"
                                                    class="btn btn-block btn-success"> الطلب مكتمل</a>
                                            @endif
                                        </ul>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
