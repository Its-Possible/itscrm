<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <!-- Links -->
    @vite('resources/css/app.css')
    <!-- Title -->
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <aside id="app-sidebar" class="col col-md-3 col-lg-2 bg-dark">
                    <header id="app-sidebar-header">
                        <div class="row">
                            <div class="col col-md-10 offset-1">
                                kjdhfjsakhfdksdajfh
                            </div>
                        </div>
                    </header>
                </aside>
                <main id="app-main" class="col col-md-9 col-lg-9">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
