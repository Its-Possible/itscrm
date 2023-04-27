<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <!-- Links -->
    @vite('resources/css/app.css')

    @livewireStyles

    <!-- Title -->
    <title>{{ config('app.name') }} :: {{ $title }}</title>
</head>
<body>
    <div id="app">
        <aside id="app-sidebar" class="col-md-1">
            <header id="app-sidebar-header">
                <div id="app-sidebar-header-brand">
                    <a href="{{ route('app.home') }}">
                        <h4>MT</h4>
                    </a>
                </div>
            </header>
            <x-app-navigation-component :page="$page" />
        </aside>
        <main id="app-main">
            @yield('content')
        </main>

    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="{{ mix('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
