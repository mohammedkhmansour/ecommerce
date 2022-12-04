@extends('layouts.master')
@section('title','السلايد')
@section('page-title','اضافة سلايد')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">اضافة سلايد </li>
@endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
@endif

<form action="{{route('sliders.update',$sliders->id)}}" method="post" enctype="multipart/form-data">

@csrf
@method('put')

<div class="form-group">
    <label for="">الاسم</label>
    {{-- <input type="text" name="name" class="form-control" > --}}

    <input type="text" name="title" @class([
        'form-control',
        'is-invalid'  => $errors->has('title')
    ])
     value="{{old('title',$sliders->title)}}">

    @error('title')
    <div class="text-danger">
        {{$message}}
    </div>
@enderror
</div>

    <div class="form-group">
        <label for="">الوصف</label>
        <textarea name="description" @class([
            'form-control',
            'is-invalid'  => $errors->has('description')
        ])>
        {{old('description',$sliders->description)}}
        </textarea>
        @error('description')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>


    <div class="form-group">
        <label for="">صورة</label>
        <input type="file" name="image_slide" class="form-control" id="image">
    </div>
    <img id="showImage" src="{{ !empty($sliders->image_slide)?
        asset('storage/' . $sliders->image_slide) :
        url('no_image.jpg') }}" class="user-img" alt="user avatar" width="100px" height="100px">
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
