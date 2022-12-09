<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">

            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
            @can('view-any',App\Models\Category::class)


            <!-- menu item Elements-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                    <div class="pull-left"><i class="ti-palette"></i><span
                            class="right-nav-text">ألتصنيفات</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('categories.index')}}">كل التصنيفات</a></li>
                    <li><a href="{{route('categories.create')}}">اضف تصنيف</a></li>
                    <li><a href="{{route('categories.trashed')}}">التصنيفات المؤرشفة</a></li>
                </ul>
            </li>
            @endcan
            <!-- menu item calendar-->
            @can('view-any',App\Models\Product::class)

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                    <div class="pull-left"><i class="ti-calendar"></i><span
                            class="right-nav-text">المنتجات</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                    <li><a href="{{route('products.index')}}">كل المنتجات</a></li>
                    <li><a href="{{route('products.create')}}">اضف منتج</a></li>
                    <li><a href="{{route('products.trashed')}}">المنتجات المؤرشفة</a></li>
                </ul>
            </li>
            @endcan
                        <!-- menu item Charts-->
                        @can('order.pending')


                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                                <div class="pull-left"><i class="ti-pie-chart"></i><span
                                        class="right-nav-text">الطلبات</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>

                            <ul id="chart" class="collapse" data-parent="#sidebarnav">
                                <li> <a href="{{route('order.pending')}}">طلبات قيد الانتظار</a> </li>
                                <li> <a href="{{route('order.processing')}}">طلبات قيد المعالجة </a> </li>
                                <li> <a href="{{route('order.completed')}}">طلبات مكتملة</a> </li>
                            </ul>
                        </li>

                        @endcan



            <!-- menu font icon-->
            @can('view-any',App\Models\Role::class)

            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">الادوار والصلاحيات</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{route('roles.index')}}">كل الصلاحيات</a> </li>
                    <li> <a href="{{route('roles.create')}}">اضافة صلاحية جديدة</a> </li>
                </ul>
            </li>
            @endcan
            <!-- menu title -->
            @can('view-any',App\Models\Contact::class)

            <li>
                <a href="{{route('contact.index')}}"><i class="ti-location-pin"></i><span class="right-nav-text">الرسائل</span>
                </a>
            </li>            <!-- menu item Widgets-->
            <li>
            @endcan

            <!-- menu item Form-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                    <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">الاعدادات
                            </span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="Form" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="{{route('settings.edit')}}">الاعدادت العامة</a> </li>
                    <li> <a href="{{route('sliders.index')}}"> السلايدر</a> </li>
                    <li> <a href="{{route('testemonials.index')}}">الاراء</a> </li>

                </ul>
            </li>


        </ul>
    </div>
</div>
