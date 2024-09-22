<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> @yield('title') - Crystal Clean Sydney</title>
  <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">
  <!-- plugins:css -->
 

  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('backend')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('backend')}}/assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('backend')}}/assets/images/favicon.png" />
   {{-- for toastar --}}
   <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/toastr/toastr.css') }}">
</head>

<body class="with-welcome-text">
  @yield('login_content')
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('backend')}}/assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="{{asset('backend')}}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('backend')}}/assets/vendors/chart.js/chart.umd.js"></script>
  <script src="{{asset('backend')}}/assets/vendors/progressbar.js/progressbar.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('backend')}}/assets/js/off-canvas.js"></script>
  <script src="{{asset('backend')}}/assets/js/template.js"></script>
  <script src="{{asset('backend')}}/assets/js/settings.js"></script>
  <script src="{{asset('backend')}}/assets/js/hoverable-collapse.js"></script>
  <script src="{{asset('backend')}}/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('backend')}}/assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="{{asset('backend')}}/assets/js/dashboard.js"></script>
  <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->


  <script type="text/javascript" src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
  <script src="{{ asset('backend/plugins/sweetalert/sweetalert.min.js') }}"></script>

  <script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','bg-info')}}"
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
  </script>

  <script>
    $(document).on("click", "#delete", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
         swal({
           title: "Are you Want to delete?",
           text: "Once Delete, This will be Permanently Delete!",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
                window.location.href = link;
           } else {
             swal("Safe Data!");
           }
         });
     });
  </script>
  {{-- before logout showing alert message --}}
  <script>
    $(document).on("click", "#logout", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
         swal({
           title: "Are you want to logout?",
           text: "",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
                window.location.href = link;
           } else {
             swal("Not Logout!");
           }
         });
     });
  </script>

</body>

</html>