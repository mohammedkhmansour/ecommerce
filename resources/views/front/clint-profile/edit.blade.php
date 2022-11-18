@extends('layouts.master')
@section('title','الصفحة الشخصية')
@section('page-title',' الصفحة الشخصية')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active" الصفحة الشخصية</li>
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

<form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
@method('put')
@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label for="">الاسم الاول</label>
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
    <x-form.input name="first_name" :value="$user->profile->first_name" />

    </div>

    <div class="form-group col-md-6">
        <label for="">الاسم الثاني</label>
    <x-form.input name="last_name" :value="$user->profile->last_name" />

    </div>

    <div class="form-group col-md-6">
        <label for=""> تاريخ الميلاد</label>
        <x-form.input type="date" name="birthday" :value="$user->profile->birthday" />

    </div>

        <div class="form-group col-md-6">

            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="ذكر" @checked($user->profile->gender == 'ذكر')>
                <label class="form-check-label" for="exampleRadios1">
                  ذكر
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="انثى" @checked($user->profile->gender == 'انثى')>
                <label class="form-check-label" for="exampleRadios2">
                   انثى
                </label>
              </div>
        </div>

</div>

    <div class="form-row">
        <div class="col-md-4">
        <label for="">عنوان الشارع</label>
            <x-form.input type="text" name="street_address" :value="$user->profile->street_address" />
        </div>
        <div class="col-md-4">
        <label for="">المدينة</label>
            <x-form.input type="text" name="city" :value="$user->profile->city" />
        </div>
        <div class="col-md-4">
        <label for="">المحافظة</label>
            <x-form.input type="text" name="state" :value="$user->profile->state" />
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-4">
        <label for="">رمز بريدي</label>
            <x-form.input type="text" name="postal_code" :value="$user->profile->postal_code" />
        </div>
        <div class="col-md-4">
        <label for="">الدولة</label>
            <select name="contry" class="form-control">
                <option value="">No Result</option>
                @foreach ($countries as $country)
                <option value="{{$country}}" @selected(old('country',$user->profile->contry) == $user->profile->contry)>{{$country}}</option>
                @endforeach
            </select>
         </div>
        <div class="col-md-4">
        <label for="">locale</label>
            <select name="locale" class="form-control">
                <option value="">No Result</option>
                @foreach ($locales as $locale)
                <option value="{{$locale}}" @selected(old('country',$user->profile->locale) == $user->profile->locale)>{{$locale}}</option>
                @endforeach
            </select>
            </div>

    </div>

    <div class="form-group">
        <label for="">صورة</label>
        <input type="file" name="avatar" class="form-control" id="image">

    </div>
    <div class="mb-3">
        {{-- <img id="showImage"  src="{{url('no_image.jpg') }}"  style="width:100px; height: 100px;"> --}}
        <img id="showImage" src="{{ !empty($user->profile->avatar)?
            asset('storage/' . $user->profile->avatar) :
            url('no_image.jpg') }}" class="user-img" alt="user avatar" width="100px" height="100px">

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
