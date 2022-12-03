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

                            <th>الرسالة </th>
                            <th>عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                            <tr>

                                <td>{{ $contact->message }}</td>
                                <td class="d-flex">

                                    <form action="{{route('contact.destroy',$contact->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="button-trashed">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        </form>
                                      </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
