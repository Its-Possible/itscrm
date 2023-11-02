<div x-data="automations">
    <div class="row mb-4">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Automatizações</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('its.app.automations.create') }}">Criar automatização</a>
        </div>
    </div>
    @if(session()->has('its.message.body'))
        <div class="row">
            <div class="col-12">
                <div
                    class="alert text-center @if(session('its.message.type') == 'warning') alert-warning @elseif('its.message.type' == 'danger') alert-danger @else alert-success @endif">{{ session('its.message.body') }}</div>
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="col-md-10">
                    <button class="btn btn-filter">Adicionar filtro <i class="ri-add-fill ml-2"></i></button>
                </div>
                <div class="col-md-2 text-right pt-3">
                    {{ $automations_counter }} Encontrados
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 font-bold row-border-radius">
            <section id="app-customers-header">
                <div>Nome</div>
                <div>Descrição</div>
                <div>Estado</div>
                <div>Ações</div>
            </section>
        </div>
        <div class="col-md-8 offset-2">
            @forelse($automations as $index => $automation)
                <article class="app-automation">
                    <div>
                        <div class="text-bold">{{ $automation->name }}</div>
                    </div>
                    <div>
                        <p>Enviar todos emails de aniversário</p>
                    </div>
                    <div>
                        <span class="badge badge-success bg-success">
                            <i class="ri ri-check"></i>
                            A correr
                        </span>
                    </div>
                    <div>
                        <a class="btn btn-transparent" href="{{ route('its.app.customers.edit', $automation->slug) }}">
                            <i class="ri ri-play-line"></i>
                        </a>
                        <a class="btn btn-transparent" href="{{ route('its.app.customers.edit', $automation->slug) }}">
                            <i class="ri ri-stop-line"></i>
                        </a>
                        <button class="btn btn-transparent text-danger" wire:click="delete('{{ $automation->slug }}')">
                            <i class="ri ri-delete-bin-line"></i>
                        </button>
                    </div>
                    <div></div>
                    <div></div>
                </article>
            @empty
            @endforelse
        </div>
    </div>
</div>

