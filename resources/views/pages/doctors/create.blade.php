@extends('layouts.app.dashboard', ['title' => 'Médicos'])


@section('content')
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Criar médico</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('its.app.customers.create') }}">Guardar</a>
        </div>
    </div>
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
               <h6 class="mt-4">Informações do médico</h6>
               <hr />
               <div class="form-group">
                   <label for="user">Utilizador</label>
                   <select class="form-control" name="user" id="user">
                       <option disabled selected>Selecionar</option>
                       @forelse($users as $user)
                           <option>{{ decrypt_data($user->firstname) }}</option>
                       @empty

                       @endforelse
                   </select>
               </div>
               <div class="form-group">
                   <label for="user">E-mail</label>
                   <input class="form-control" type="email" placeholder="E-mail" id="doctor-email" />
               </div>

               <div class="form-group">
                   <label for="user">Telemóvel</label>
                   <input class="form-control" type="text" placeholder="Telemóvel" id="doctor-mobile" />
               </div>
               <h6 class="mt-5">Especialidade médica</h6>
               <hr />
               <livewire:backoffice.components.doctors.specialities-component />
               <h6 class="mt-5">Horário do médico</h6>
               <hr />
               <livewire:backoffice.components.doctors.schedule-component />
           </div>
        </div>
    </div>
    <div class="row mb-4" x-data="customers">
        <div class="col-md-8 offset-2 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('its.app.customers.create') }}">Guardar</a>
        </div>
    </div>
@endsection
