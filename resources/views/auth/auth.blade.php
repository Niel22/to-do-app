<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<!-- Mirrored from wowdash.wowtheme7.com/demo/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Sep 2024 07:32:35 GMT -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TO-DO APP</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="16x16">
  <!-- remix icon font css  -->
  <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
  <!-- BootStrap css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
  <!-- Apex Chart css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/apexcharts.css') }}">
  <!-- Data Table css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/dataTables.min.css') }}">
  <!-- Text Editor css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">
  <!-- Date picker css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/flatpickr.min.css') }}">
  <!-- Calendar css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/full-calendar.css') }}">
  <!-- Vector Map css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">
  <!-- Popup css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/magnific-popup.css') }}">
  <!-- Slick Slider css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/slick.css') }}">
  <!-- prism css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/prism.css') }}">
  <!-- file upload css -->
  <link rel="stylesheet" href="{{ asset('assets/css/lib/file-upload.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/lib/audioplayer.css') }}">
  <!-- main css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
  <body>

<section class="auth bg-base d-flex flex-wrap">


    @yield('content')


</section>

<!-- jQuery library js -->
<script src="{{ asset('assets/js/lib/jquery-3.7.1.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('assets/js/lib/bootstrap.bundle.min.js') }}"></script>
<!-- Apex Chart js -->
<script src="{{ asset('assets/js/lib/apexcharts.min.js') }}"></script>
<!-- Data Table js -->
<script src="{{ asset('assets/js/lib/dataTables.min.js') }}"></script>
<!-- Iconify Font js -->
<script src="{{ asset('assets/js/lib/iconify-icon.min.js') }}"></script>
<!-- jQuery UI js -->
<script src="{{ asset('assets/js/lib/jquery-ui.min.js') }}"></script>
<!-- Vector Map js -->
<script src="{{ asset('assets/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Popup js -->
<script src="{{ asset('assets/js/lib/magnifc-popup.min.js') }}"></script>
<!-- Slick Slider js -->
<script src="{{ asset('assets/js/lib/slick.min.js') }}"></script>
<!-- prism js -->
<script src="{{ asset('assets/js/lib/prism.js') }}"></script>
<!-- file upload js -->
<script src="{{ asset('assets/js/lib/file-upload.js') }}"></script>
<!-- audioplayer -->
<script src="{{ asset('assets/js/lib/audioplayer.js') }}"></script>

<!-- main js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<script>
    // ================== Password Show Hide Js Start ==========
    function initializePasswordToggle(toggleSelector) {
      $(toggleSelector).on('click', function() {
          $(this).toggleClass("ri-eye-off-line");
          var input = $($(this).attr("data-toggle"));
          if (input.attr("type") === "password") {
              input.attr("type", "text");
          } else {
              input.attr("type", "password");
          }
      });
  }
  // Call the function
  initializePasswordToggle('.toggle-password');
// ========================= Password Show Hide Js End ===========================
</script>

</body>

</html>
