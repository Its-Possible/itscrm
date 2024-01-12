<div x-data="customers">
    <div class="row mb-4">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Clientes</h1>
        </div>
        <div class="col-md-3 text-right offset-2">
            <a class="btn btn-filter inverter" href="{{ route('app.customers.create') }}">Adicionar cliente</a>
            <button class="btn btn-default" wire:click="$set('modal', true)">Importar </button>
        </div>
    </div>
    @if(session()->has('message.body'))
        <div class="row">
            <div class="col-12">
                <div class="alert text-center @if(session('message.type')) {{ session('message.type'); }} @endif"></div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2 text-right pt-3">
            {{ $foundCounter }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 font-bold row-border-radius">
            <section id="app-list-header">
                <div>Nome</div>
                <div>Tags</div>
                <div>Estado</div>
                <div>Ações</div>
            </section>
        </div>
        <div class="col-md-8 offset-2">
            @forelse($customers as $index => $customer)
                <article class="app-customer">
                    <div><img class="app-customer-avatar" src="{{ $customer->avatar->image }}"/></div>
                    <div>
                        <div class="text-bold">{{ decrypt_data($customer->name) }}</div>
                        <div><small>{{ decrypt_data($customer->email) }}</small></div>
                    </div>
                    @forelse($customer->tags as $tag)
                        <span class="badge app-customer-tag" style="background-color: {{ $tag->color }}"></span>
                    @empty
                        <p class="text-center">Sem tags</p>
                    @endforelse
                    <div>
                        <span class="badge badge-success bg-success">
                            <i class="ri ri-check"></i>
                            Ativo
                        </span>
                    </div>
                    <div>
                        <a class="btn btn-transparent" href="{{ route('its.app.customers.show', $customer->slug) }}">
                            <i class="ri ri-eye-line"></i>
                        </a>
                        <a class="btn btn-transparent" href="{{ route('its.app.customers.edit', $customer->slug) }}">
                            <i class="ri ri-pencil-line"></i>
                        </a>
                        <button class="btn btn-transparent text-danger" wire:click="delete('{{ $customer->slug }}')">
                            <i class="ri ri-delete-bin-line"></i>
                        </button>
                    </div>
                    <div></div>
                    <div></div>
                </article>
            @empty
                <article id="app-list-nocustomers">
                    Não há clientes registados, <a href="#">adicione</a> o primeiro.
                </article>
            @endforelse
        </div>
    </div>
</div>
