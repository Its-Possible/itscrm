@extends('layouts.dashboard', ['title' => 'Especialidades'])

@section('header')
    <div class="row" x-data="header">
        <div class="col-md-10 offset-1 mb-3">
            <h1 class="py-3"><span x-text="salut"></span>, {{ decrypt_data(auth()->user()->firstname) }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <livewire:backoffice.app-specialities-component />
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endpush
