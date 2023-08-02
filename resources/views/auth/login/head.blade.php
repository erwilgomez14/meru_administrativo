<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @can('isAdmin')
        <title>Panel de Administrador</title>
    @endcan
    @can('isPrensa')
        <title>Panel de Prensa</title>
    @endcan
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link href="{{ asset('styles/stylesHome/css/fontspanel.css') }}" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('styles/stylesHome/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/stylesHome/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/stylesHome/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/stylesHome/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/stylesHome/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/stylesHome/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/stylesHome/vendor/simple-datatables/style.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('styles/stylesHome/css/style.css') }}" rel="stylesheet">
    <!-- Favicons -->
    <link href="{{ asset('styles/stylesPanel/img/favicon.ico') }}" rel="icon">

</head>
