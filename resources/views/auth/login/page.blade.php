@include('auth.login.head')

<body class="off-canvas-sidebar">
    <!-- CONTENT AREA -->

    @yield('content')

    <!--  END CONTENT AREA  -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @include('auth.login.script')
</body>

</html>
