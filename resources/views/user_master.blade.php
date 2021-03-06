<!DOCTYPE html>
<html lang="en">
<head>
    @include('user_headtop')
</head>

<body>
    <!--**********************************
        Main wrapper start
    ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('user_menu')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('user_content')
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        @include('user_footer')
        <!--**********************************
            Footer end
        ***********************************-->

    <!--**********************************
        Main wrapper end
    ***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->
         @include('user_src') 
</body>
</html>