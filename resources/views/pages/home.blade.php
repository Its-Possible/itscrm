@extends('layouts.app.dashboard', ['title' => 'Inicio'])

@section('header')
    <div class="row" x-data="header">
        <div class="col-md-10 offset-1 mb-3">
            <h1 class="py-3"><span x-text="salut"></span>, {{ decrypt_data(auth()->user()->firstname) }}</h1>
        </div>
    </div>

    <livewire:backoffice.app-navigation-component />
@endsection

@section('content')
    Content Page Heare
@endsection
