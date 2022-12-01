@extends('layouts.master')
@section('title','الصلاحيات')
@push('styles')
    <style>
    .button-trashed{
     font-size: 25px;
    color: rgb(233, 19, 30);
    margin-right: 10px;
    width: 25px;
    height: 25px;
    background: transparent;
    border: none;
    text-align: center;
    margin-top: -8px;

    }
    </style>
@endpush
@section('page-title','كل الادوار')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">كل الادوار </li>
@endsection
@section('content')
@if (session('msg'))
<div class="alert alert-{{ session('type') }} alert-dismissible fade show">
    {{ session('msg') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
</div>
@endif
<div dir="ltr">
    <a href="{{ route('roles.create') }}" title="اضف تصنيف" class="btn btn-primary mb-3">+</a>
</div>
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
      <div class="card-body">


       <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Abilities</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td><a href="{{ route('roles.edit', $role->id) }}">{{ $role->name }}</a></td>
                    <td>{{count($role->abilities) }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      {{$roles->withQueryString()->links()}}
      </div>
    </div>
    </div>
  </div>

@endsection
