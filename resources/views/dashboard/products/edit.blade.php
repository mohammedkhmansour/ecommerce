
@extends('layouts.master')
@section('title','المنتجات')
@section('page-title','اضافة منتج')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">تعديل منتج </li>
@endsection

@section('content')

<x-erroralert />

<form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">

@csrf
@method('put')
<div class="row">
    <div class="form-group col-md-6">
        <label for="">الاسم</label>

    <x-form.input name="name" :value="$product->name" />


    </div>

    <div class="form-group col-md-6">
        <label for="">كود المنتج</label>
    <x-form.input name="product_code" :value="$product->product_code"/>
    </div>

    <div class="form-group col-md-12">
        <label for="">التصنيف</label>
        <select name="category_id" class="form-control form-select">
            <option value="">اختر التصنيف</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}" @selected(old('category_id', $product->category_id) == $category->id)>{{$category->name}}</option>
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
    <input type="text" class="form-control" name="price" value="{{$product->price}}"/>
    </div>

    <div class="form-group col-md-6">
        <label for="">سعر الخصم</label>
    <input type="text" class="form-control" name="compare_price" value="{{$product->compare_price}}" />

    </div>

</div>

    <div class="form-group">
        <label for="">الوصف</label>
        <textarea name="description" @class([
            'form-control',
            'is-invalid'  => $errors->has('description')
        ])>
        {{$product->description}}
        </textarea>
        @error('description')
        <div class="text-danger">

        </div>
    @enderror
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label for="">الكمية</label>
        <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}"/>
        </div>

        <div class="form-group col-md-6">
            <label for="">التاج</label>
        <input type="text" value="{{$tags}}"  class="form-control" name="tag" />
        </div>

    </div>

    <div class="row">

        <div class="form-group col-md-6">
            <label for="">صورة</label>
            <input type="file" name="image" class="form-control" id="image">
            <img id="showImage" src="{{ !empty($product->image)?
                asset('storage/' . $product->image) :
                url('no_image.jpg') }}" class="user-img" alt="user avatar" width="100px" height="100px">        </div>

        <div class="form-group col-md-6">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="فعال" @checked($product->status == "فعال")>
                <label class="form-check-label" for="exampleRadios1">
                  فعال
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="غير فعال" @checked($product->status == "غير فعال")>
                <label class="form-check-label" for="exampleRadios2">
                  غير فعال
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="featured" id="exampleRadios3" value="مميز" @checked($product->featured == "مميز")>
                <label class="form-check-label" for="exampleRadios3">
                  مميز
                </label>
              </div>
        </div>

    </div>

    <button type="submit" class="btn btn-primary">ارسال</button>


</form>


@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>

<script>
    var inputElm = document.querySelector('[name=tag]'),
    tagify = new Tagify (inputElm);

</script>
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
