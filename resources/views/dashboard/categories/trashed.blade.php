@extends('layouts.master')
@section('title','categoryies')
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
@section('page-title','التصنيفات المؤرشفة ')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">التصنيفات المؤرشفة  </li>
@endsection
@section('content')

<div dir="ltr">
    <a href="{{ route('categories.index') }}" title="اضف تصنيف" class="btn btn-primary mb-3">التصنيفات</a>
</div>
<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
      <div class="card-body">
       <h5 class="card-title border-0 pb-0">فلتر</h5>
       <div class="table-responsive">
        <table class="mb-0 table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">الاسم</th>
                <th scope="col">التصنيف الاب</th>
                <th scope="col">الحالة</th>
                <th scope="col">الصورة</th>
                <th scope="col">العمليات</th>

              </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ( $categories as $category )
                @php
               $i++;
                @endphp

                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$category->name}}</td>
                    <td>{{$category->parent->name}}</td>
                    <td>{{$category->statuse}}</td>
                    {{-- <td>
                        @if (!$category->image) <img src="{{url('no_image.jpg')}}" height="100px" width="100px" alt="">@endif
                        @if ($category->image)
                        <img src="{{asset('storage/' . $category->image)}}" height="100px" width="100px" alt="">
                        @endif

                </td> --}}
                <td><img src="{{$category->image_url}}" height="100px" width="100px" alt=""></td>
                    <td class="d-flex">
                        <form action="{{route('categories.restore',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-info btn-sm mx-2">
                            <i class="fa fa-location-arrow"></i>
                        </button>
                        </form>

                        {{-- <form action="{{route('categories.forsedelete',$category->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                            </form> --}}

                        <button type="button" class="btn btn-danger btn-sm mx-2" data-toggle="modal"
                        data-target="#delete{{ $category->id }}"
                        title="delete"><i
                            class="fa fa-trash"></i></button>

                   </td>
                  </tr>
                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{$category->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                               id="exampleModalLabel">
                                                <p>حذف : <b>{{$category->name}}</b></p>
                                           </h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <form action="{{ route('categories.forsedelete',$category->id) }}"
                                                 method="post">
                                               {{ method_field('Delete') }}
                                               @csrf
                                               <p>هل انت متأكد من عملية الحذف <b>{{$category->name}}</b></p>
                                               <input id="id" type="hidden" name="id" class="form-control"
                                                      value="{{ $category->id }}">
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">اغلاق</button>
                                                   <button type="submit"
                                                           class="btn btn-danger">حذف</button>
                                               </div>
                                           </form>
                                       </div>
                                   </div>
                               </div>
                           </div>
                @endforeach
            </tbody>
          </table>
      </div>
    </div>
    </div>
  </div>

@endsection
