<div class="side-menu-fixed">
    <div class="scrollbar side-menu-bg">
        <ul class="nav navbar-nav side-menu" id="sidebarnav">
            <!-- menu item Dashboard-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                    </div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="index.html">Dashboard 01</a> </li>
                    <li> <a href="index-02.html">Dashboard 02</a> </li>
                    <li> <a href="index-03.html">Dashboard 03</a> </li>
                    <li> <a href="index-04.html">Dashboard 04</a> </li>
                    <li> <a href="index-05.html">Dashboard 05</a> </li>
                </ul>
            </li>
            <!-- menu title -->
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
                </ul>
            </li>
            <!-- menu item table -->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                    <div class="pull-left"><i class="ti-layout-tab-window"></i><span
                            class="right-nav-text">data table</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="table" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="data-html-table.html">Data html table</a> </li>
                    <li> <a href="data-local.html">Data local</a> </li>
                    <li> <a href="data-table.html">Data table</a> </li>
                </ul>
            </li>
            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li>
            <!-- menu item Custom pages-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                    <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">Custom
                            pages</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="projects.html">projects</a> </li>
                    <li> <a href="project-summary.html">Projects summary</a> </li>
                    <li> <a href="profile.html">profile</a> </li>
                    <li> <a href="app-contacts.html">App contacts</a> </li>
                    <li> <a href="contacts.html">Contacts</a> </li>
                    <li> <a href="file-manager.html">file manager</a> </li>
                    <li> <a href="invoice.html">Invoice</a> </li>
                    <li> <a href="blank.html">Blank page</a> </li>
                    <li> <a href="layout-container.html">layout container</a> </li>
                    <li> <a href="error.html">Error</a> </li>
                    <li> <a href="faqs.html">faqs</a> </li>
                </ul>
            </li>
            <!-- menu item Authentication-->
            <li>
                <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                    <div class="pull-left"><i class="ti-id-badge"></i><span
                            class="right-nav-text">Authentication</span></div>
                    <div class="pull-right"><i class="ti-plus"></i></div>
                    <div class="clearfix"></div>
                </a>
                <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                    <li> <a href="login.html">login</a> </li>
                    <li> <a href="register.html">register</a> </li>
                    <li> <a href="lockscreen.html">Lock screen</a> </li>
                </ul>
            </li>
            <!-- menu item maps-->
            <li>
                <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                    <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
            </li>
            <!-- menu item timeline-->
            <li>
                <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                </a>
            </li>
            <!-- menu item Multi level-->

        </ul>
    </div>
</div>
