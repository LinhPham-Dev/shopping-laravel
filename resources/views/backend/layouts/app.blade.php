<!DOCTYPE html>
<html lang="en">

<head>
    @includeIf('backend.layouts.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('asset-backend') }}/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        @includeIf('backend.layouts.navbar')
        <!-- / Navbar -->

        <!-- Main Sidebar Container -->
        @includeIf('backend.layouts.sidebar')
        <!-- / Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @includeIf('backend.layouts.footer')
        <!-- /.footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- /.wrapper -->

    <!-- Script Src -->
    @includeIf('backend.layouts.script')

    @yield('script-option')
</body>

</html>
