@extends('layouts.app.auth')

@section('content')
    <div class="container-fluid">
        <div id="auth" class="row">
            <section id="auth-form" class="col col-md-5 col-lg-5">
                <div class="container">
                    <header id="auth-header">
                        <div id="auth-header-logo font-bold">{{ config('app.name') }}</div>
                    </header>
                    <section class="col col-md-10 col-lg-8 offset-2" id="auth-form-containet">
                        <header>
                            <h3>Iniciar sessão</h3>
                            <h5>Bem-vindo de volta, preencha com as suas credenciais!</h5>
                        </header>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="input-group">
                            <input type="text" name="username" form="auth-submit" class="form-control" placeholder="Utilizador ou E-mail" aria-label="Username" />
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" form="auth-submit" class="form-control" placeholder="Password" aria-label="Password" />
                        </div>
                        <div class="input-group">
                            <button type="submit" form="auth-submit" name="auth-button" class="form-control btn btn-primary">Iniciar sessão</button>
                        </div>
                        <div class="row py-3 mt-2">
                            <div class="col-md-4 offset-1">
                                <hr />
                            </div>
                            <div class="col-md-1">
                                <small>ou</small>
                            </div>
                            <div class="col-md-4">
                                <hr />
                            </div>
                        </div>
                        <section class="auth-extern">
                            <div class="row">
                                <div class="col-md-1 col-lg-2 offset-2">
                                    <button class="btn btn-social">
                                        <i class="ri ri-google-fill"></i>
                                    </button>
                                </div>
                                <div class="col-md-1 col-lg-2">
                                    <button class="btn btn-social">
                                        <i class="ri ri-facebook-fill"></i>
                                    </button>
                                </div>
                                <div class="col-md-1 col-lg-2">
                                    <button class="btn btn-social">
                                        <i class="ri ri-twitter-fill"></i>
                                    </button>
                                </div>
                                <div class="col-md-1 col-lg-2">
                                    <button class="btn btn-social">
                                        <i class="ri ri-github-fill"></i>
                                    </button>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </section>
            <aside class="col col-md-7 col-lg-7">
            </aside>
        </div>
    </div>
    <form id="auth-submit" name="auth-submit" action="{{ route('crm.auth.sign-in.submit') }}" method="post">
        @csrf
    </form>
@endsection
