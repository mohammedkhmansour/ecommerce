@extends('layouts.master')
@section('title','الطلبات')

@section('page-title','كل الطلبات')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">كل الطلبات </li>
@endsection
@section('content')

<div class="row">
    <div class="col-xl-12 mb-30">
      <div class="card card-statistics h-100">
        <div class="card-body">
          <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الكود</th>
                    <th>الحالة</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>عمليات</th>

                </tr>
            </thead>
            @php
             $i = 0;
            @endphp
            <tbody>
                @foreach ($orders as $order)
                @foreach ($order->orderItems as $item)
            {{$i++}}
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$item->product_name}}</td>

                    <td>{{$order->number}}</td>
                    <td>{{$order->status}}</td>

                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>


                    <td>
                        <a href="{{route('order.details',$order->id)}}"
                            class="btn btn-info">تفاصيل </a>

                    </td>

                </tr>
                @endforeach
                @endforeach
         </table>
        </div>
        </div>
      </div>
    </div>
</div>

@endsection
