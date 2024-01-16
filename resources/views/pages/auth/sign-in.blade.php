@extends('layouts.auth')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <section id="app-auth-side-left" class="col-md-6">
                <div class="container">
                    <header id="app-auth-side-left-header">
                        <h3>Bem-vindo de volta</h1>
                        <p>Introduza as suas credênciais para iniciar sessão</p>
                        <button type="button" class="btn btn-default form-control">Iniciar sessão com o Google</button>
                    </header>
                    <div class="separator">
                        <div class="row">
                            <div class="col-md-5 text-right">
                                <hr />
                            </div>
                            <div class="col-md-2 text-center">ou</div>
                            <div class="col-md-5 text-right">
                                <hr />
                            </div>
                        </div>
                    </div>
                    <form method="post" action="{{ route('auth.sign-in.submit') }}">
                        <div class="container">
                            <div class="input-group">
                                <label for="username">Utilizador ou email</label>
                                <input type="text" class="form-control" name="username" placeholder="exemplo@clinicamais.pt" value="{{ old("auth.login") }}" id="username" />
                            </div>
                            <div class="input-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="username" placeholder="Min. 8 caracteres" value="{{ old("auth.login") }}" id="password" />
                            </div>
                            <div class="input-group">
                                <button type="button" class="btn btn-secondary form-control">Iniciar sessão com o Google</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <aside id="app-auth-side-right" class="col-md-6">
                <div class="content">
                </div>
            </aside>
        </div>
    </div>
@endsection
