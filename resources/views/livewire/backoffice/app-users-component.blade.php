<div>
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Utilizadores</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('its.app.customers.create') }}">Adicionar utilizador</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="col-md-10">
                    <button class="btn btn-filter">Adicionar filtro</button>
                    {{--                    <button class="btn btn-filter"><span>Tag:</span> Filiado <i class="ri-close-fill ml-2"></i></button>--}}
                    {{--                    <button class="btn btn-filter"><span>Tipo:</span> Pessoa <i class="ri-close-fill ml-2"></i></button>--}}
                    {{--                    <button class="btn btn-filter"><span>Pais:</span> Portugal & Estados Unidos<i class="ri-close-fill ml-2"></i></button>--}}
                </div>
                <div class="col-md-2 text-right pt-3">
                    {{ $users_counter }} Encontrados
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 font-bold row-border-radius">
            <section id="app-list-header">
                <div>Utilizador</div>
                <div></div>
                <div>Estado</div>
                <div>Ações</div>
            </section>
        </div>
        <div class="col-md-8 offset-2">
            @forelse($users as $index => $user)
                <article class="app-customer">
                    <div><img class="app-customer-avatar" src="{{ $user->avatar }}" /></div>
                    <div>
                        <div class="text-bold">{{ decrypt_data($user->firstname) }}</div>
                        <div><small>{{ $user->email }}</small></div>
                    </div>
                    <div>
                    </div>
                    <div>
                        <span class="badge badge-success bg-success">
                            <i class="ri ri-check"></i>
                            Ativo
                        </span>
                    </div>
                    <div>
                        <a class="btn btn-transparent" href="{{ route('its.app.users.show', $user->username) }}">
                            <i class="ri ri-eye-line"></i>
                        </a>
                        <a class="btn btn-transparent" href="{{ route('its.app.users.edit', $user->username) }}">
                            <i class="ri ri-pencil-line"></i>
                        </a>
                        <button class="btn btn-transparent text-danger">
                            <i class="ri ri-delete-bin-line"></i>
                        </button>
                    </div>
                    <div></div>
                    <div></div>
                </article>
            @empty
                <article id="app-list-nocustomers">
                    Não há médicos registados, <a href="#">adicione</a> o primeiro.
                </article>
            @endforelse
        </div>
    </div>
</div>
