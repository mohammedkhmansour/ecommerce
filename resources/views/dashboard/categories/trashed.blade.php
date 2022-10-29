@extends('layouts.master')
@section('title','categoryies')
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
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><img src="{{url('no_image.jpg')}}" height="100px" alt=""></td>
            <td>
                <a href="" id="delete"><i class="fa fa-trash" style="font-size:25px;color:rgb(233, 19, 30);"></i> </a>
           </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td><img src="{{url('no_image.jpg')}}" height="100px" alt=""></td>
            <td>
                <a href="" id="delete"><i class="fa fa-trash" style="font-size:25px;color:rgb(233, 19, 30);"></i> </a>
           </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td><img src="{{url('no_image.jpg')}}" height="100px" alt=""></td>
            <td>
                <a href="" id="delete"><i class="fa fa-trash" style="font-size:25px;color:rgb(233, 19, 30);"></i> </a>
           </td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    </div>
  </div>

@endsection
