<!-- jquery -->
<script src="{{asset('admin/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{asset('admin/js/plugins-jquery.js')}}"></script>

<!-- plugin_path -->
<script>var plugin_path = 'js/';</script>
<script type="text/javascript">var plugin_path = '{{asset('admin/js')}}/';</script>


<!-- chart -->
<script src="{{asset('admin/js/chart-init.js')}}"></script>

<!-- calendar -->
<script src="{{asset('admin/js/calendar.init.js')}}"></script>

<!-- charts sparkline -->
<script src="{{asset('admin/js/sparkline.init.js')}}"></script>

<!-- charts morris -->
<script src="{{asset('admin/js/morris.init.js')}}"></script>

<!-- datepicker -->
<script src="{{asset('admin/js/datepicker.js')}}"></script>

<!-- sweetalert2 -->
<script src="{{asset('admin/js/sweetalert2.js')}}"></script>

<!-- toastr -->
<script src="{{asset('admin/js/toastr.js')}}"></script>

<!-- validation -->
<script src="{{asset('admin/js/validation.js')}}"></script>

<!-- lobilist -->
<script src="{{asset('admin/js/lobilist.js')}}"></script>

<!-- custom -->
<script src="{{asset('admin/js/custom.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('admin/js/tostarcss.css')}}" >

<script src="{{asset('admin/js/tostarjs.js')}}"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
       case 'info':
       toastr.info(" {{ Session::get('message') }} ");
       break;
       case 'success':
       toastr.success(" {{ Session::get('message') }} ");
       break;
       case 'warning':
       toastr.warning(" {{ Session::get('message') }} ");
       break;
       case 'error':
       toastr.error(" {{ Session::get('message') }} ");
       break;
    }
    @endif
   </script>
@stack('scripts')
</body>
</html>
