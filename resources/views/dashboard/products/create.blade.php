@extends('layouts.master')
@section('title','المنتجات')
@section('page-title','اضافة منتج')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">اضافة منتج </li>
@endsection

@section('content')

<x-erroralert />

<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="">الاسم</label>
        {{-- <input type="text" name="name" @class([
            'form-control',
            'is-invalid'  => $errors->has('name')
        ])
         value="{{old('name',$product->name)}}">

        @error('name')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror --}}
    <x-form.input name="name" />

    </div>

    <div class="form-group col-md-6">
        <label for="">التصنيف</label>
        <select name="category_id" class="form-control form-select">
            <option value="">اختر التصنيف</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="">السعر</label>
    <x-form.input name="price" />
    </div>

    <div class="form-group col-md-6">
        <label for="">سعر الخصم</label>
    <x-form.input name="compare_price" />

    </div>

</div>

    <div class="form-group">
        <label for="">الوصف</label>
        <textarea name="description" @class([
            'form-control',
            'is-invalid'  => $errors->has('description')
        ])>
        </textarea>
        @error('description')
        <div class="text-danger">

        </div>
    @enderror
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="">الكمية</label>
        <x-form.input name="quantity" />
        </div>

        <div class="form-group col-md-6">
            <label for="">التاج</label>
        <x-form.input name="tag" />
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-6">
            <label for="">صورة</label>
            <input type="file" name="image" class="form-control" id="image">
            <img id="showImage"  src="{{url('no_image.jpg') }}"  style="width:100px; height: 100px;">
        </div>

        <div class="form-group col-md-6">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="فعال">
                <label class="form-check-label" for="exampleRadios1">
                  فعال
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="غير فعال">
                <label class="form-check-label" for="exampleRadios2">
                  غير فعال
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="featured" id="exampleRadios1" value="مميز">
                <label class="form-check-label" for="exampleRadios1">
                  مميز
                </label>
              </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary">ارسال</button>


</form>


@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
       $('#image').change(function(e) {
           var reader = new FileReader();
           reader.onload = function(e) {
              $('#showImage').attr('src', e.target.result);
           }
           reader.readAsDataURL(e.target.files['0']);
       });
    });
 </script>
@endpush
