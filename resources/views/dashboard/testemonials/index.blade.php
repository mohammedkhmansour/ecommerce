@extends('layouts.master')
@section('title','الاراء')
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
@section('page-title','كل الاراء')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"> الاراء </li>
@endsection
@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') }} alert-dismissible fade show">
    {{ session('msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
@endif
<div dir="ltr">
    <a href="{{ route('testemonials.create') }}" title="اضف راي" class="btn btn-primary mb-3">+</a>
</div>
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
      <div class="card-body">

       <div class="table-responsive">
        <table class="mb-0 table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">الاسم الصغير</th>
            <th scope="col">الوصف</th>
            <th scope="col">الصورة</th>
            <th scope="col">العمليات</th>

          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @forelse ($testemonials as $testemonial)
            @php
           $i++;
            @endphp

            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$testemonial->title}}</td>
                <td>{{$testemonial->sub_title}}</td>
                {{-- <td>{{$testemonial->parent->name}}</td> هاد باستخدام العلاقة--}}
                <td>{{$testemonial->description}}</td>

                <td>
                    @if (!$testemonial->image_testemonial) <img src="{{url('no_image.jpg')}}" height="100px" width="100px" alt="">@endif
                    @if ($testemonial->image_testemonial)
                    <img src="{{asset('storage/' . $testemonial->image_testemonial)}}" height="100px" width="100px" alt="">
                    @endif
                </td>
                {{-- <td>
                    @if (!$testemonial->image) <img src="{{url('no_image.jpg')}}" height="100px" width="100px" alt="">@endif
                    @if ($testemonial->image)
                    <img src="{{asset('storage/' . $testemonial->image)}}" height="100px" width="100px" alt="">
                    @endif

            </td> --}}
                <td class="d-flex">
                    <a href="{{route('testemonials.edit',$testemonial->id)}}"><i class="fa fa-edit" style="font-size:25px;color:rgb(173, 159, 252);"></i> </a>
                    <form action="{{route('testemonials.destroy',$testemonial->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="button-trashed">
                        <i class="fa fa-trash"></i>
                    </button>
                    </form>
               </td>
              </tr>
            @empty
                <tr>no</tr>
            @endforelse


        </tbody>
      </table>
      </div>
    </div>
    </div>
  </div>

@endsection
