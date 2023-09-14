@extends('layouts.app.dashboard', ['title' => 'Especialidades'])


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
               <div class="row">
                   <div class="col-md-10">
                       <div class="form-group">
                           <label for="user">Especialidade</label>
                           <select class="form-control" name="user" id="user">
                               <option disabled selected>Selecionar</option>
                               @forelse($specialities as $speciality)
                                   <option>{{ $speciality->name }}</option>
                               @empty

                               @endforelse
                           </select>
                       </div>
                   </div>
                   <div class="col-md-2 mt-5">
                       <a class="btn btn-filter inverter" href="{{ route('its.app.customers.create') }}">Guardar</a>
                   </div>
               </div>
               <div class="form-group">
                   <label for="user">Telemóvel</label>
                   <input class="form-control" type="text" placeholder="Telemóvel" id="doctor-mobile" />
               </div>
               <div class="form-group">
                   <label for="user">Defina o horário semanal do médico</label>
                   <button class="btn btn-filter">Domingo</button>
                   <button class="btn btn-filter inverter">Segunda-feira</button>
                   <button class="btn btn-filter">Terça-feira</button>
                   <button class="btn btn-filter">Quarta-feira</button>
                   <button class="btn btn-filter">Quinta-feira</button>
                   <button class="btn btn-filter">Sexta-feira</button>
                   <button class="btn btn-filter">Sábado</button>
               </div>
               <div class="form-group">
                   <button class="btn btn-filter">09:00 - 11:00</button>
                   <button class="btn btn-filter">12:00 - 14:00</button>
                   <button class="btn btn-filter">14:00 - 17:00</button>
                   <button class="btn btn-filter">17:00 - 19:00</button>
                   <button class="btn btn-filter">19:00 - 21:00</button>
                   <button class="btn btn-filter">21:00 - 23:00</button>
                   <button class="btn btn-filter inverter">Outro</button>
               </div>
               <div class="form-group">
                   <div class="row mb-4">
                       <div class="col-md-3">
                           <input class="form-control" type="text" placeholder="Horário de Entrada" id="doctor-start" />
                       </div>
                       <div class="col-md-3">
                           <input class="form-control" type="text" placeholder="Horário de Saída" id="doctor-end" />
                       </div>
                   </div>
                   <div class="row mb-4">
                       <div class="col-md-3">
                           <input class="form-control" type="text" placeholder="Horário de Entrada" id="doctor-start" />
                       </div>
                       <div class="col-md-3">
                           <input class="form-control" type="text" placeholder="Horário de Saída" id="doctor-end" />
                       </div>
                       <div class="col-md-2">
                           <button class="btn btn-filter btn-delete">
                               <i class="ri ri-delete-bin-line"></i>
                           </button>
                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-2">
                           <button class="btn btn-filter inverter">Adicionar</button>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
    <div class="row mb-4" x-data="customers">
        <div class="col-md-8 offset-2 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('its.app.customers.create') }}">Guardar</a>
        </div>
    </div>
@endsection
