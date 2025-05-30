<!-- Meta Tag -->
@yield('meta')
<!-- Title Tag -->
<title>@yield('title')</title>
<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">

<!-- Preload Poppins Font (Faster Loading) -->
<link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" as="style">
<!-- Web Font (Poppins with all weights) -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">

<!-- UI Libraries -->
<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/jquery-ui.css')}}">

<!-- Icons -->
<link rel="stylesheet" href="{{asset('frontend/css/font-awesome.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/themify-icons.css')}}">

<!-- Plugins -->
<link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/niceselect.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/slicknav.min.css')}}">

<!-- Animation & Carousel -->
<link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/flex-slider.min.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/owl-carousel.css')}}">

<!-- Main Styles -->
<link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">

<style>
  /* Apply Poppins globally to all elements */
  body,
  h1, h2, h3, h4, h5, h6,
  .btn,
  input,
  select,
  textarea,
  a,
  span,
  div {
    font-family: 'Poppins', sans-serif !important;
  }

  /* Force Poppins for specific elements that might inherit other fonts */
  .dropdown-menu,
  .form-control,
  .modal,
  .tooltip,
  .popover {
    font-family: 'Poppins', sans-serif !important;
  }

  /* Multilevel dropdown */
  .dropdown-submenu {
    position: relative;
  }
  .dropdown-submenu>a:after {
    content: "\f0da";
    float: right;
    border: none;
    font-family: 'Poppins', sans-serif;
  }
  .dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: 0px;
    margin-left: 0px;
  }
  .dropdown-submenu:hover>.dropdown-menu {
    display: block;
  }
</style>

@stack('styles')