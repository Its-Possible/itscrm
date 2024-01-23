@extends('layouts.auth')

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
                            <h3>Criar conta</h3>
                            <h5>Bem-vindo, preencha o formulário para criação de conta!</h5>
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
                            <input type="text" name="name" form="auth-submit" class="form-control" placeholder="Nome" aria-label="Name" />
                        </div>
                        <div class="input-group">
                            <input type="text" name="username" form="auth-submit" class="form-control" placeholder="Utilizador" aria-label="Username" />
                        </div>
                        <div class="input-group">
                            <input type="text" name="email" form="auth-submit" class="form-control" placeholder="E-mail" aria-label="Email" />
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" form="auth-submit" class="form-control" placeholder="Password" aria-label="Password" />
                        </div>
                        <div class="input-group">
                            <input type="password" name="reconfirm" form="auth-submit" class="form-control" placeholder="Confirmar password" aria-label="Repassword" />
                        </div>
                        <div class="input-group">
                            <button type="submit" form="auth-submit" name="auth-button" class="form-control btn btn-primary">Criar conta</button>
                        </div>
                        <div class="input-group">
                            <a class="text-center" href="{{ route('auth.sign-in') }}">Eu já tenho conta</a>
                        </div>
                    </section>
                </div>
            </section>
            <aside class="col col-md-7 col-lg-7">
            </aside>
        </div>
    </div>
    <form id="auth-submit" name="auth-submit" action="{{ route('auth.sign-in.submit') }}" method="post">
        @csrf
    </form>
@endsection
