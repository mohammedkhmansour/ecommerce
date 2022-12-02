@extends('layouts.master')
@section('title','الصلاحيات')
@section('page-title',' تعديل صلاحية')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"> تعديل صلاحية </li>
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

<form action="{{route('roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
@method('put')
@csrf

 <div class="form-group">
        <label for="">الاسم</label>
        <input type="text" name="name" class="form-control" value="{{$role->name}}">

</div>

<div class="form-group mb-3">
    <label for="">Abilities:</label>
    <div>
        @foreach(config('abilities') as $key => $label)
        <div class="mb-1">
            <label for="">
                <input type="checkbox" name="abilities[]" value="{{ $key }}" @if(in_array($key, $role->abilities)) checked @endif>
                {{ $label }}
            </label>
        </div>
        @endforeach
    </div>
    @error('abilities')
    <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>


    <button type="submit" class="btn btn-primary">تعديل</button>


</form>


@endsection
