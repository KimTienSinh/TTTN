<?php
// session_start();

?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Focus - Bootstrap Admin Dashboard </title>
<!-- Favicon icon -->
<base href="{{asset('')}}">
<link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
<link rel="stylesheet" href="./admin/vendor/owl-carousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="./admin/vendor/owl-carousel/css/owl.theme.default.min.css">
<link href="./admin/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">

<!-- Daterange picker --> 
<link href="./admin/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet"> 
<!-- Clockpicker --> 
<link href="./admin/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet"> 
<!-- asColorpicker --> 
<link href="./admin/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet"> 
<!-- Material color picker --> 
<link href="./admin/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet"> 

<!-- Pick date --> 
<link rel="stylesheet" href="./admin/vendor/pickadate/themes/default.css"> 

<link rel="stylesheet" href="./admin/vendor/pickadate/themes/default.date.css"> 

<!-- Datatable -->
<link href="./admin/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

<link href="./admin/css/style.css" rel="stylesheet">
<link href="./admin/css/lbs.css" rel="stylesheet">

<!-- Daterangepicker -->
<script src="./admin/js/plugins-init/bs-daterange-picker-init.js"></script>
<script src="./admin/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="./admin/css/style1.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- ckeditorfix -->



<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>


<div class="nav-header">
    <a href="index" class="brand-logo">
        <img class="logo-abbr" src="./admin/images/logo.png" alt="">
        <img class="logo-compact" src="./admin/images/logo-text.png" alt="">
        <img class="brand-title" src="./admin/images/logo-text.png" alt="">
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>

<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                        <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                            <i class="mdi mdi-magnify"></i>
                        </span>
                        <div class="dropdown-menu p-0 m-0">
                            <form>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item dropdown notification_dropdown">

                    </li>
                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account">&ensp;
                                @if (Auth::check()&&Auth::user()->role!='user')
                                {{Auth::user()->user_name}}
                                @else
                                @php
                                echo'
                                <script>
                                    window.location = "index"; 
                                </script>';
                                @endphp

                                @endif
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">


                            <form action="{{url('/postLogout')}}" method="post">
                                @csrf

                                <button type="submit" class="btn btn-block "><i class="icon-user"><span
                                            class="ml-2">Logout</span></i></button>
                            </form>


                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>