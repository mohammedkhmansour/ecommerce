@include('layouts.head')
<!--=================================
 header End-->
@include('layouts.main-header')
<!--=================================
 Main content -->

<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        @include('layouts.sidebar')

        <!-- Left Sidebar End-->

        <!--=================================
wrapper -->

        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0"> @yield('page-title')</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                            @section('breadcrumb')
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="default-color">الرئيسية</a></li>
                            @show
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            @yield('content')
            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

    {{-- @include('layouts.main-footer') --}}

        </div><!-- main content wrapper end-->
    </div>
</div>
</div>

<!--=================================
 footer -->
@include('layouts.footer')
