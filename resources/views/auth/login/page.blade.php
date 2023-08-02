<!DOCTYPE html>
<html lang="en">
@include('auth.login.header')
@include('auth.login.sidebar')

<body class="sidebar-noneoverflow" style="background-image: url('{{ asset('assets/images/fondohb.png') }}')">
    <!-- CONTENT AREA -->

    @yield('content')

    <!-- CONTENT AREA -->

    @include('auth.login.footer')

    <!--  END CONTENT AREA  -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @include('auth.login.script')
</body>

</html>
