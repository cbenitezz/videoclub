<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Club</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">


    <link rel="stylesheet" href="{{ asset('sweet/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    @stack('style')
</head>

<body>

    @include('layouts.header',['appTitle'=>'Video Club'])
    @include('layouts.nav',['appTitle'=>'Video Club'])


    <main>
            <section>

                @yield('content')

            </section>



            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

            <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

            <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

            <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

            <script src="{{ asset('sweet/sweetalert2.min.js') }}"></script>
            <script src="{{ asset('toastr/toastr.min.js') }}"></script>

            @stack('script')
    </main>
    <footer>Video Club © 2022 </footer>
</body>
</html>
