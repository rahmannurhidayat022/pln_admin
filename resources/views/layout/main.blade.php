@extends('../layout/base')

@section('body')

<body class="main">
    @yield('content')
    @include('../layout/components/dark-mode-switcher')
    @include('../layout/components/main-color-switcher')

    <!-- BEGIN: JS Assets-->
    <script
        src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @vite('resources/js/app.js')
    <!-- END: JS Assets-->

    @yield('script')
</body>
@endsection