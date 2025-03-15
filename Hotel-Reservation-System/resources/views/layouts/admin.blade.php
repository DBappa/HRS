<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Hotel Reservation System') }}</title>

        <!--favicon-->
	    <link rel="icon" href={{asset("admin/backend-theme/assets/images/favicon-32x32.png")}} type="image/png"/>

        <!--plugins-->
            <link href={{asset("admin/backend-theme/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css")}} rel="stylesheet"/>
            <link href={{asset("admin/backend-theme/assets/plugins/simplebar/css/simplebar.css")}} rel="stylesheet" />
            <link href={{asset("admin/backend-theme/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css")}} rel="stylesheet" />
            <link href={{asset("admin/backend-theme/assets/plugins/metismenu/css/metisMenu.min.css")}} rel="stylesheet"/>

        <!-- loader-->
            <link href={{asset("admin/backend-theme/assets/css/pace.min.css")}} rel="stylesheet"/>
            <script src={{asset("admin/backend-theme/assets/js/pace.min.js")}}></script>

        <!-- Bootstrap CSS -->
            <link href={{asset("admin/backend-theme/assets/css/bootstrap.min.css")}} rel="stylesheet">
            <link href={{asset("admin/backend-theme/assets/css/bootstrap-extended.css")}} rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
            <link href={{asset("admin/backend-theme/assets/css/app.css")}} rel="stylesheet">
            <link href={{asset("admin/backend-theme/assets/css/icons.css")}} rel="stylesheet">

            <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

        <!-- Theme Style CSS -->
            <link rel="stylesheet" href={{asset("admin/backend-theme/assets/css/dark-theme.css")}}/>
            <link rel="stylesheet" href={{asset("admin/backend-theme/assets/css/semi-dark.css")}}/>
            <link rel="stylesheet" href={{asset("admin/backend-theme/assets/css/header-colors.css")}}/>

            @yield('styles')
    </head>
<body >

    <div class="wrapper">

            @include('layouts.partials.navbar')

            <!--sidebar-->

        <div class="d-flex">
                @include('layouts.partials.sidebar')

        </div>

        <main>
            <!--main content-->
            @yield('content')

        </main>

        <footer>
            <!--footer-->
                @include('layouts.partials.footer')
        </footer>
            
        <!-- Bootstrap JS -->
            <script src={{asset("admin/backend-theme/assets/js/bootstrap.bundle.min.js")}}></script>

         <!--plugins-->
            <script src={{asset("admin/backend-theme/assets/js/jquery.min.js")}}></script>
            <script src={{asset("admin/backend-theme/assets/plugins/simplebar/js/simplebar.min.js")}}></script>
            <script src={{asset("admin/backend-theme/assets/plugins/metismenu/js/metisMenu.min.js")}}></script>
            <script src={{asset("admin/backend-theme/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js")}}></script>
            <script src={{asset("admin/backend-theme/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js")}}></script>
            <script src={{asset("admin/backend-theme/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js")}}></script>
            <script src={{asset("admin/backend-theme/assets/plugins/chartjs/js/chart.js")}}></script>
            <script src={{asset("admin/backend-theme/assets/js/index.js")}}></script>
            
        <!--app JS-->
            <script src={{asset("admin/backend-theme/assets/js/app.js")}}></script>

            @yield('scripts')

    </div>
</body>
</html>