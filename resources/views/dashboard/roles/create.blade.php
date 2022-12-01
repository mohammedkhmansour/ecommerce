@extends('layouts.master')
@section('title','الصلاحيات')
@section('page-title','اضافة صلاحية')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">اضافة صلاحية </li>
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

<form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">

@csrf

<div class="form-group">
    <label for="">الاسم</label>
    {{-- <input type="text" name="name" class="form-control" > --}}

    <input type="text" name="name" @class([
        'form-control',
        'is-invalid'  => $errors->has('name')
    ])
     value="{{old('name',$roles->name)}}">

    @error('name')
    <div class="text-danger">
        {{$message}}
    </div>
@enderror
</div>

<div class="form-group mb-3">
    <label for="">Abilities:</label>
    <div>
        @foreach(config('abilities') as $key => $label)
        <div class="mb-1">
            <label for="">
                <input type="checkbox" name="abilities[]" value="{{ $key }}" >
                {{ $label }}
            </label>
        </div>
        @endforeach
    </div>
    @error('abilities')
    <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
    <button type="submit" class="btn btn-primary">ارسال</button>


</form>


@endsection


