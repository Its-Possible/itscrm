@extends('layouts.app.base', ['page' => 'home', 'title' => 'Inicio'])

@section('content')
    <section id="app-main-content">
        <x-app-header-component/>
    </section>
    <section id="app-main-extra">
        <x-app-authenticate-user/>
    </section>
@endsection
