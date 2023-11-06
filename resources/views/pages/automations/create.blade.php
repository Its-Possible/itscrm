@extends('layouts.app.dashboard', ['title' => 'Criar automatização'])


@section('content')
    <div class="row mb-4" x-data="automations">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Criar automatização</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <button form="automation-create" type="submit" class="btn btn-filter inverter pull-right">Guardar</button>
        </div>
    </div>
    @if(session()->has('its.message.body'))
        <div class="row">
            <div class="col-8 offset-2">
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
        <div class="col-md-8 offset-2 bg-white row-border-radius bg-white py-2 mb-4">
            <div class="container">
                <livewire:backoffice.components.automations.information-component />
                <livewire:backoffice.components.automations.schedule-component />
            </div>
        </div>
        <div class="row mb-4" x-data="automations">
            <div class="col-md-8 offset-2 text-right pt-3">
                <form id="automation-create" action="{{ route('its.app.automations.store') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <button form="automation-create" type="submit" class="btn btn-filter inverter pull-right">Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
