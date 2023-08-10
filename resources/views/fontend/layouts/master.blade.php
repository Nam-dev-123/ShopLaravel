<!doctype html>
<html lang="en">
<head>
    @include('fontend.includes.head')

    <!-- Additional CSS Files -->
    @include('fontend.includes.style')
</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    @include('fontend.includes.header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Content Start ***** -->
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    <!-- ***** Main Content End ***** -->

    <!-- ***** Footer Start ***** -->
    @include('fontend.includes.footer')
    <!-- ***** Footer End ***** -->

    <!-- ***** Script Start ***** -->
    @include('fontend.includes.script')
    <!-- ***** Script End ***** -->
</body>
</html>
