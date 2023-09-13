@extends('layouts.app.dashboard', ['title' => 'Criar cliente'])

@section('header')
    <div class="row" x-data="header">
        <div class="col-md-10 offset-1 mb-3">
            <h1 class="py-3"><span x-text="salut"></span>, {{ decrypt_data(auth()->user()->firstname) }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Criar cliente</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('its.app.customers.create') }}">Guardar</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-8 offset-2 bg-white row-border-radius">
            <div class="row">
                <div class="input-group">
                    <label class="input-group-text" for="its-app-customer-form-name">Nome</label>
                    <input id="its-app-customer-form-name" class="form-control" name="name" placeholder="O nome do cliente" />
                </div>
                <div class="input-group">
                    <label class="input-group-text" for="its-app-customer-form-name">E-mail</label>
                    <input id="its-app-customer-form-name" class="form-control" name="name" placeholder="O email do cliente" />
                </div>
                <div class="input-group">
                    <label class="input-group-text" for="its-app-customer-form-name">E-mail</label>
                    <input id="its-app-customer-form-name" class="form-control" name="name" placeholder="O email do cliente" />
                </div>
                <div class="input-group">
                    <label class="input-group-text" for="its-app-customer-form-name">E-mail</label>
                    <input id="its-app-customer-form-name" class="form-control" name="name" placeholder="O email do cliente" />
                </div>
            </div>
        </div>
    </div>
@endsection
