@extends('layouts.app.dashboard', ['title' => 'Especialidades'])

@section('content')
    @section('content')
        <div class="row mb-4" x-data="customers">
            <div class="col-md-5 offset-2">
                <h1 class="mt-3 mb-3">Criar especialidade</h1>
            </div>
            <div class="col-md-3 text-right pt-3">
                <button type="submit" class="btn btn-filter inverter" form="speciality-create">Guardar</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-2 bg-white row-border-radius bg-white py-2 mb-4">
                <div class="container">
                    <h6 class="mt-4">Informações da especialidade</h6>
                    <hr/>
                    <div class="form-group">
                        <label for="speciality-name">Nome</label>
                        <input form="speciality-create" class="form-control" type="text" placeholder="Nome da especialidade" name="speciality-name"/>
                    </div>
                    <div class="form-group">
                        <label for="speciality-description">Descrição</label>
                        <textarea class="form-control" type="text" form="speciality-create" placeholder="Descrição da especialidade" name="speciality-description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-8 offset-2 text-right pt-3">
                <form id="speciality-create" action="{{ route('its.app.specialities.store') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-filter inverter">Guardar</button>
                </form>
            </div>
        </div>
    @endsection
@endsection
