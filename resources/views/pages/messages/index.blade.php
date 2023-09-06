@extends('layouts.app.dashboard', ['title' => 'Mensagens'])

@section('content')
    <section id="app-main-messages">
        @forelse($messages as $message)
            {{ $message }}
        @empty
            Não foram enviadas mensagens!
        @endforelse

        <div id="app-main-messages-form">
            <input form="messages-form" name="message" id="message" type="text" placeholder="Escreve aqui a tua mensagem!" />
            <button form="messages-form" type="submit">Enviar mensagem <i class="ri ri-mail-add-line"></i></button>
        </div>
    </section>
    <form name="messages-form" id="messages-form" method="post" action="{{ route('its.app.messages.store') }}">
        @csrf
    </form>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('9b6bf9aa6a0df94ca136', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('messages');
        channel.bind('messages', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
@endsection
