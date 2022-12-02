@extends('layouts.master')
@section('title','المستخدمين')
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
@section('page-title','كل المستخدمين')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">كل المستخدمين </li>
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
    <a href="{{ route('users.create') }}" title="اضف مستخدم" class="btn btn-primary mb-3">+</a>
</div>
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
      <div class="card-body">


       <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>الاسم</th>
                    <th>الحالة</th>
                    <th>تاريخ الانشاء</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('users.edit', $user->id) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->statuse}}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
    </div>
  </div>

@endsection
