@extends('layouts.master')
@section('title','products')
@push('styles')
    <style>
    .button-trashed{
     font-size: 25px;
    color: rgb(233, 19, 30);
    margin-right: 10px;
    width: 25px;
    height: 25px;
    background: transparent;
    border: none;
    text-align: center;
    margin-top: -8px;

    }
    </style>
@endpush
@section('page-title','كل المنتجات')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">كل المنتجات </li>
@endsection
@section('content')

<div dir="ltr">
    <a href="{{ route('products.create') }}" title="اضف منتج" class="btn btn-primary mb-3">+</a>
</div>
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
                    <th>التصنيف</th>
                    <th>الحالة</th>
                    <th>السعر</th>
                    <th>الكمية</th>
                    <th>الصورة</th>
                    <th>عمليات</th>

                </tr>
            </thead>
            @php
             $i = 0;
            @endphp
            <tbody>
                @foreach ($products as $product)
            {{$i++}}
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->product_code}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->status}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td><img src="{{$product->image_url}}" height="100px" width="100px"></td>
                    <td class="d-flex">
                        <a href="{{route('products.edit',$product->id)}}"><i class="fa fa-edit" style="font-size:25px;color:rgb(173, 159, 252);"></i> </a>
                        <form action="{{route('products.destroy',$product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="button-trashed">
                            <i class="fa fa-trash"></i>
                        </button>
                        </form>
                   </td>

                </tr>
                @endforeach
         </table>
        </div>
        </div>
      </div>
    </div>
</div>

@endsection
