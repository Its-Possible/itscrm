@extends('layouts.dashboard', ['title' => 'Especialidades :: Editar '])

@section('content')
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Editar especialidade</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <button type="submit" class="btn btn-filter inverter" form="speciality-create">Guardar</button>
        </div>
    </div>
    @if(session()->has('message.body'))
        <div class="row">
            <div class="col-8 offset-2">
                <div class="alert text-center @if(session('message.type') == 'warning') alert-warning @elseif('message.type' == 'danger') alert-danger @else alert-success @endif">{{ session('message.body') }}</div>
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
                <h6 class="mt-4">Informações da especialidade</h6>
                <hr/>
                <div class="form-group">
                    <label for="speciality-name">Nome</label>
                    <input form="speciality-create" class="form-control" type="text" placeholder="Nome da especialidade" name="name" value="{{ $speciality->name }}" />
                </div>
                <div class="form-group">
                    <label for="speciality-description">Descrição</label>
                    <textarea id="speciality-description" class="form-control input-danger" form="speciality-create" placeholder="Descrição da especialidade" name="description">{{ $speciality->description }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-8 offset-2 text-right pt-3">
            <form id="speciality-create" action="{{ route('app.specialities.update', $speciality->slug) }}" method="post" autocomplete="off">
                @method('PUT')
                {{ csrf_field() }}
                <button type="submit" class="btn btn-filter inverter">Guardar</button>
            </form>
        </div>
    </div>
@endsection
