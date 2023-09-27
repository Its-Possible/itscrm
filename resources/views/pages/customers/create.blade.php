@extends('layouts.app.dashboard', ['title' => 'Clientes'])


@section('content')
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Criar cliente</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <button form="doctor-create" type="submit" class="btn btn-filter inverter pull-right">Guardar</button>
        </div>
    </div>
    @if(session()->has('its.message.body'))
        <div class="row">
            <div class="col-12">
                <div class="alert text-center @if(session('its.message.type') == 'warning') alert-warning @elseif('its.message.type' == 'danger') alert-danger @else alert-success @endif">{{ session('its.message.body') }}</div>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="row">
            <div class="col-8 offset-2">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 offset-2 mb-2">
            <div class="alert alert-warning text-center">
                <i class="ri ri-alert-line"></i>
                Para adicionar um médico ao sistema é necessário que seja utilizador
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 bg-white row-border-radius bg-white py-2 mb-4">
            <div class="container">
                <livewire:backoffice.components.customers.information-component />
                <livewire:backoffice.components.customers.doctors-component />
            </div>
        </div>
    </div>
    <div class="row mb-4" x-data="customers">
        <div class="col-md-8 offset-2 text-right pt-3">
            <form id="customer-create" action="{{ route('its.app.customers.store') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <button form="customer-create" type="submit" class="btn btn-filter inverter pull-right">Guardar</button>
            </form>
        </div>
    </div>
@endsection
