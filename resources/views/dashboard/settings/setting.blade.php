@extends('layouts.master')
@section('title','التصنيفات')
@section('page-title','اضافة تصنيف')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">اضافة تصنيف </li>
@endsection

@section('content')

<form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="row">
    <div class="form-group col-md-6 col-md-6">
        <label for="">اسم الموقع</label>

        <input type="text" name="name" @class([
            'form-control',
            'is-invalid'  => $errors->has('name')
        ])
         value="{{old('name',$setting->name)}}"
         >

        @error('name')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="">فيس الموقع</label>

        <input type="text" name="face" @class([
            'form-control',
            'is-invalid'  => $errors->has('face')
        ])
          value="{{$setting->face}}"
         >

        @error('face')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="">انستا الموقع</label>

        <input type="text" name="insta" @class([
            'form-control',
            'is-invalid'  => $errors->has('insta')
        ])
         value="{{old('insta',$setting->insta)}}"
         >

        @error('insta')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="">تويتر الموقع</label>

        <input type="text" name="twitter" @class([
            'form-control',
            'is-invalid'  => $errors->has('twitter')
        ])
         value="{{old('twitter',$setting->twitter)}}"
         >

        @error('twitter')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="">ايميل الموقع</label>

        <input type="text" name="email" @class([
            'form-control',
            'is-invalid'  => $errors->has('email')
        ])
         value="{{old('email',$setting->email)}}"
         >

        @error('email')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="">جوال الموقع</label>

        <input type="text" name="phone" @class([
            'form-control',
            'is-invalid'  => $errors->has('phone')
        ])
         value="{{old('phone',$setting->phone)}}"
         >

        @error('phone')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>


    <div class="form-group col-md-6">
        <label for="">الوصف</label>
        <textarea name="description" @class([
            'form-control',
            'is-invalid'  => $errors->has('description')
        ])>
        {{old('description',$setting->description)}}
        </textarea>
        @error('description')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="">صورة</label>
        <input type="file" name="logo" class="form-control" id="image">
    </div>
    {{-- <img src="{{asset('storage/' . $settings-image) }}" height="50" alt=""> --}}


    <div class="mb-3">
        {{-- <img id="showImage"  src="{{url('no_image.jpg') }}"  style="width:100px; height: 100px;"> --}}
        <img id="showImage" src="{{ !empty($setting->logo)?
            asset('storage/' . $setting->logo) :
            url('no_image.jpg') }}" class="user-img" alt="user avatar" width="100px" height="100px">

    </div>


</div>
<button type="submit" class="btn btn-primary">حفظ</button>

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

