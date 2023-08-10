<!DOCTYPE html>
<html lang="en">
<head>

    @include('backend.includes.head')
    @include('backend.includes.style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('backend.includes.navbar')

    @include('backend.includes.sidebar')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('content-header')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href=""><i class="fa-solid fa-house"></i></a></li>
                            <li class="breadcrumb-item active">@yield('sidebar-item')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    @include('backend.includes.footer')

</div>

@include('backend.includes.script')

</body>
</html>
