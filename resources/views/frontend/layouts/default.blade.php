<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('frontend.includes.head')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>


{{-- <section class="main_content dashboard_part large_header_bg"> --}}

{{-- @include('frontend.includes.site-mobile-menu') --}}
<div id="mainBody">

    @include('frontend.includes.navbar')

    
    @yield('content')

    @include('frontend.includes.footer')
</div>
@include('frontend.includes.scripts')
@yield('js')
</body>

<!-- Mirrored from demo.dashboardpack.com/user-management-html/empty_page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 May 2023 17:07:52 GMT -->

</html>
