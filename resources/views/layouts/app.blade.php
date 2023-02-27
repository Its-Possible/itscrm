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
                <aside id="app-sidebar" class="col-md-3">
                    <div class="row">
                        <nav id="app-nav" class="col-md-2">
                            <a href="#" class="active"><i class="ri ri-home-2-line"></i></a>
                            <a href="#"><i class="ri ri-user-2-line"></i></a>
                            <a href="#"><i class="ri ri-article-line"></i></a>
                            <a href="#"><i class="ri ri-mail-line"></i></a>
                            <a href="#"><i class="ri ri-smartphone-line"></i></a>
                            <a href="#"><i class="ri ri-tools-line"></i></a>
                        </nav>
                        <header id="app-sidebar-header" class="col-md-10">
                            <section id="app-sidebar-header-user">
                                <div id="app-sidebar-header-user-avatar">
                                    <div id="app-sidebar-header-user-status"></div>
                                </div>
                                <div id="app-sidebar-header-user-name">Eduardo Bessa</div>
                                <nav id="app-sidebar-header-user-links">
                                    <a href="#"><i class="ri ri-facebook-line"></i></a>
                                    <a href="#"><i class="ri ri-instagram-line"></i></a>
                                    <a href="#"><i class="ri ri-twitter-line"></i></a>
                                </nav>
                            </section>
                        </header>
                    </div>
                </aside>
                <div id="app-container" class="col-md-9">
                    <header id="app-header">
                        <input type="text" placeholder="Pesquisar" />
                    </header>
                    <main id="app-main">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
