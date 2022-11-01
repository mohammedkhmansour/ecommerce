@extends('layouts.master')
@section('title','categoryies')
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
@section('page-title','كل التصنيفات')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">كل التصنيفات </li>
@endsection
@section('content')

<div dir="ltr">
    <a href="{{ route('categories.create') }}" title="اضف تصنيف" class="btn btn-primary mb-3">+</a>
</div>
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
      <div class="card-body">
       <h5 class="card-title border-0 pb-0">فلتر</h5>
       <form action="{{URL::current()}}" method="get" class="d-flex justify-content-between mb-4">

        <input type="text" name="name" placeholder="name" class="mx-2" value="{{request('name')}}">
        <select name="statuse" class="form-control mx-2">
            <option value="">الكل</option>
            <option value="فعال" @selected(request('statuse') == 'فعال')>فعال</option>
            <option value="غير فعال" @selected(request('statuse') == 'غير فعال')>غير فعال</option>
        </select>
        <button type="submit" class="mx-2">Filter</button>
    </form>

       <div class="table-responsive">
        <table class="mb-0 table table-hover table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الاسم</th>
            <th scope="col">التصنيف الاب</th>
            <th scope="col">الحالة</th>
            <th scope="col">الصورة</th>
            <th scope="col">العمليات</th>

          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @forelse ($categories as $category)
            @php
           $i++;
            @endphp

            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->parent->name}}</td>
                <td>{{$category->statuse}}</td>
                {{-- <td>
                    @if (!$category->image) <img src="{{url('no_image.jpg')}}" height="100px" width="100px" alt="">@endif
                    @if ($category->image)
                    <img src="{{asset('storage/' . $category->image)}}" height="100px" width="100px" alt="">
                    @endif

            </td> --}}
            <td><img src="{{$category->image_url}}" height="100px" width="100px" alt=""></td>
                <td class="d-flex">
                    <a href="{{route('categories.edit',$category->id)}}"><i class="fa fa-edit" style="font-size:25px;color:rgb(173, 159, 252);"></i> </a>
                    <form action="{{route('categories.destroy',$category->id)}}" method="post">
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
      {{$categories->withQueryString()->links()}}
      </div>
    </div>
    </div>
  </div>

@endsection
