@extends('layouts.master')
@section('title','الااراء')
@section('page-title','الااراء')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">الااراء </li>
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

<form action="{{route('testemonials.store')}}" method="post" enctype="multipart/form-data">

@csrf

<div class="form-group">
    <label for="">الاسم</label>
    {{-- <input type="text" name="name" class="form-control" > --}}

    <input type="text" name="title" @class([
        'form-control',
        'is-invalid'  => $errors->has('title')
    ])>

    @error('title')
    <div class="text-danger">
        {{$message}}
    </div>
@enderror
</div>

<div class="form-group">
    <label for="">الاسم القصير</label>

    <input type="text" name="sub_title" @class([
        'form-control',
        'is-invalid'  => $errors->has('title')
    ])>

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
        </textarea>
        @error('description')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>


    <div class="form-group">
        <label for="">صورة</label>
        <input type="file" name="image_testemonial" class="form-control" id="image">
    </div>
    <img id="showImage"  src="{{url('no_image.jpg') }}"  style="width:100px; height: 100px;">

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
