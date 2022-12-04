@extends('layouts.master')
@section('title','السلايدر')
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
@section('page-title','كل السلايدر')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"> السلايدر </li>
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
    <a href="{{ route('sliders.create') }}" title="اضف سلايد" class="btn btn-primary mb-3">+</a>
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
            <th scope="col">الوصف</th>
            <th scope="col">الصورة</th>
            <th scope="col">العمليات</th>

          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @forelse ($sliders as $slider)
            @php
           $i++;
            @endphp

            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$slider->title}}</td>
                {{-- <td>{{$slider->parent->name}}</td> هاد باستخدام العلاقة--}}
                <td>{{$slider->description}}</td>

                <td>
                    @if (!$slider->image_slide) <img src="{{url('no_image.jpg')}}" height="100px" width="100px" alt="">@endif
                    @if ($slider->image_slide)
                    <img src="{{asset('storage/' . $slider->image_slide)}}" height="100px" width="100px" alt="">
                    @endif
                </td>
                {{-- <td>
                    @if (!$slider->image) <img src="{{url('no_image.jpg')}}" height="100px" width="100px" alt="">@endif
                    @if ($slider->image)
                    <img src="{{asset('storage/' . $slider->image)}}" height="100px" width="100px" alt="">
                    @endif

            </td> --}}
                <td class="d-flex">
                    <a href="{{route('sliders.edit',$slider->id)}}"><i class="fa fa-edit" style="font-size:25px;color:rgb(173, 159, 252);"></i> </a>
                    <form action="{{route('sliders.destroy',$slider->id)}}" method="post">
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
