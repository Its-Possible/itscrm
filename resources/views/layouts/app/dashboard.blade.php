<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <!-- Links -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet" />
    <!-- Title -->
    <title>{{ config('app.name') }} :: {{ $title }}</title>
</head>
<body>
    <div id="app">
        <aside id="app-sidebar" class="col-md-1">
            @include('layouts.app.partials.sidebar')
        </aside>
        <main id="app-main" class="col-md-10">
            @include('layouts.app.partials.header')

            @yield('content')
        </main>
    </div>
    @stack('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"></script>
    @livewireScripts
</body>
</html>
