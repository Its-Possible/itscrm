<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    @livewireStyles
    @vite('resources/scss/app.scss')
    <title>{{ config('app.name') }} :: {{ $page_title }}</title>
</head>
<body>
    <div id="app">
        <div class="row">
            <header class="col-md-12">
                lskdjflkajsdfjasldjf
            </header>
            <aside class="col-md-3">
                @include('layouts.sidebar')
            </aside>
            <main class="col-md-9">
                @yield('content')
            </main>
        </div>
    </div>
    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
