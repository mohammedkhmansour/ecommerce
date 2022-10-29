@extends('layouts.master')
@section('title','التصنيفات')
@section('page-title','اضافة تصنيف')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">اضافة تصنيف </li>
@endsection

@section('content')

<form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
 <div class="form-group">
        <label for="">الاسم</label>
        <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="">التصنيف الأب</label>
        <select name="parent_id" class="form-control">
            <option value="">بدون تصنيف</option>
            <option value=""></option>
        </select>
    </div>

    <div class="form-group">
        <label for="">الوصف</label>
        <textarea name="description" class="form-control">
        </textarea>
    </div>


    <div class="form-group">
        <label for="">صورة</label>
        <input type="file" name="image" class="form-control" id="image">
    </div>
    {{-- <img src="{{asset('storage/' . $category->image) }}" height="50" alt=""> --}}
    <img id="showImage"  src="{{url('no_image.jpg') }}"  style="width:100px; height: 100px;">

{{--  <img src="{{ !empty($adminData->profile_photo_path)?
    url('upload/admin_images/' . $adminData->profile_photo_path):
    url('upload/no_image.jpg') }}" class="user-img" alt="user avatar"> --}}

    <div class="form-group">

        <div class="form-check">
            <input class="form-check-input" type="radio" name="statuse" id="exampleRadios1" value="فعال">
            <label class="form-check-label" for="exampleRadios1">
              فعال
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="statuse" id="exampleRadios2" value="غير فعال">
            <label class="form-check-label" for="exampleRadios2">
              غير فعال
            </label>
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
