<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>eCommerce Riode</title>

    <meta name="keywords" content="eCommerce Riode" />
    <meta name="description" content="Riode - Ultimate eCommerce Template">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('asset-frontend')}}/images/icons/favicon.png">

    <!-- CSS File -->
    @includeIf('frontend.layouts.css')

</head>

<body class="home">
    <div class="page-wrapper">
        <h1 class="d-none">Riode - Responsive eCommerce HTML Template</h1>
        <!-- Header -->
        @includeIf('frontend.layouts.header')
        <!-- End Header -->

        <!-- Begin of Main -->
        @yield('content')
        <!-- End of Main -->

        <!-- Footer -->
        @includeIf('frontend.layouts.footer')
        <!-- End Footer -->
    </div>

    <!-- Sticky Footer -->
    @includeIf('frontend.layouts.sticky_footer')

    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="d-icon-arrow-up"></i></a>

    <!-- MobileMenu -->
    @includeIf('frontend.layouts.menu_mobile')

    <!-- Popup -->
    @includeIf('frontend.layouts.popup')

    <!-- Plugins JS File -->
    @includeIf('frontend.layouts.javascript')
    @yield('javascript-option')
</body>

</html>
