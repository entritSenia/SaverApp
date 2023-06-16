<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Saver</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom fonts for this template-->
    @vite('resources/vendor/fontawesome-free/css/all.min.css')
    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    @vite('resources/css/sb-admin-2.min.css')
    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}

    {{-- my css changes --}}
    @vite('resources/css/app.css')

    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body id="page-top">

    @inertia

    {{-- scripts --}}

    @vite(['resources/vendor/jquery/jquery.min.js'])
    @vite(['resources/vendor/bootstrap/js/bootstrap.bundle.min.js'])
    @vite(['resources/vendor/jquery-easing/jquery.easing.min.js'])
    @vite(['resources/js/sb-admin-2.js'])
    @vite(['resources/js/sb-admin-2.min.js'])

    {{-- <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script> --}}

    <!-- Page level plugins -->
    {{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}

    {{-- <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script> --}}

</body>

</html>
