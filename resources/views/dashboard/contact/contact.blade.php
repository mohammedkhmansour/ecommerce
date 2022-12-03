@extends('layouts.master')
@section('title','الرسائل')
@section('page-title','الرسائل')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active"> الرسائل </li>
@endsection

@section('content')

<div class="page-content">
    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h5 class="mb-0">كل الرسائل </h5>
                </div>
                <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>SL</th>
                            <th>الاسم </th>
                            <th>البريد الالتروني </th>
                            <th>الرسالة </th>
                            <th>التاريخ </th>
                            <th>عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($message as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ Str::limit($item->message, 25, '..') }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td class="d-flex">

                                    <a href="{{route('contact.show',$item->id)}}" class="viewbtn"><i title="show" class="fa fa-edit" style="font-size:25px;color:rgb(218, 213, 243);"></i> </a>
                                    <form action="{{route('contact.destroy',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="button-trashed">
                                            <i class="fa fa-trash"></i>
                                        </button>
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
