@extends('layouts.app.dashboard', ['title' => 'Informações sobre o ' . decrypt_data($customer->name)])

@section('content')
    <article id="app-customer-show">
        <header id="app-customer-header">
            {{ decrypt_data($customer->name)  }}
        </header>
    </article>
@endsection
