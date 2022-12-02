@extends('layouts.master')
@section('title','التصنيفات')
@section('page-title','اضافة تصنيف')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">اضافة تصنيف </li>
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

<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">

@csrf
<div class="row">
<div class="form-group col-md-6">
    <label for="">الاسم</label>
    {{-- <input type="text" name="name" class="form-control" > --}}

    <input type="text" name="name" @class([
        'form-control',
        'is-invalid'  => $errors->has('name')
    ])
     >

    @error('name')
    <div class="text-danger">
        {{$message}}
    </div>
@enderror
</div>
<div class="form-group col-md-6">
    <label for="">البريد الالكتروني</label>
    {{-- <input type="text" name="name" class="form-control" > --}}

    <input type="text" name="email" @class([
        'form-control',
        'is-invalid'  => $errors->has('email')
    ])
     >

    @error('name')
    <div class="text-danger">
        {{$message}}
    </div>
@enderror
</div>
<div class="form-group col-md-6">
    <label for="">كلمة المرور</label>

    <input type="password" placeholder="Password" name="password" @class([
        'form-control',
        'is-invalid'  => $errors->has('password')
    ])
     >

    @error('password')
    <div class="text-danger">
        {{$message}}
    </div>
@enderror
</div>
<div class="form-group col-md-6">
    <label for="">تأكيد كلمة المرور</label>

    <input type="password" placeholder="password_confirmation" name="password_confirmation" @class([
        'form-control',
        'is-invalid'  => $errors->has('password_confirmation')
    ])
     >

    @error('password_confirmation')
    <div class="text-danger">
        {{$message}}
    </div>
@enderror
</div>

    <div class="form-group col-md-6">
        <label for=""> الصلاحيات</label>
        <select name="role" @class([
            'form-control',
            'is-invalid'  => $errors->has('role')
        ])>
            <option value="">بدون صلاحية</option>
            @foreach ($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach

        </select>
        @error('role')
        <div class="text-danger">
            {{$message}}
        </div>
    @enderror
    </div>


    <div class="form-group col-md-6">

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

</div>
</form>


@endsection

