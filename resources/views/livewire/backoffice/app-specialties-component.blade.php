<div>
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Especialidades</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('app.specialties.create') }}">Adicionar especialidade</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-8 offset-2">
            @if(session()->has('its.message.body'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert text-center @if(session('message.type') == 'warning') alert-warning @elseif('message.type' == 'danger') alert-danger @else alert-success @endif">{{ session('its.message.body') }}</div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2 text-right pt-3">
                    {{ $specialties_counter }} Encontradas
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 font-bold row-border-radius">
            <section id="app-list-header">
                <div>Especialidade</div>
                <div></div>
                <div>Estado</div>
                <div>Ações</div>
            </section>
        </div>
        <div class="col-md-8 offset-2">
            @forelse($specialties as $index => $specialty)
                <article class="app-specialities">
                    <div>
                        <div class="text-bold">{{ $specialty->name }}</div>
                        <div><small>{{ $specialty->description }}</small></div>
                    </div>
                    <div>
                        <span class="badge badge-success bg-success">
                            <i class="ri ri-check"></i>
                            Ativo
                        </span>
                    </div>
                    <div>
                        <a class="btn btn-transparent" href="{{ route('app.specialties.edit', $specialty->slug) }}">
                            <i class="ri ri-pencil-line"></i>
                        </a>
                        <button type="button" class="btn btn-transparent text-danger" onclick="confirm('Deseja mesmo apagar a especialidade {{ $specialty->name }}?') || event.stopImmediatePropagation()" wire:click.prevent="deleteSpeciality('{{ $specialty->slug }}')">
                            <i class="ri ri-delete-bin-line"></i>
                        </button>
                    </div>
                </article>
            @empty
                <article id="app-list-nocustomers">
                    Não há especialidades registadas, <a href="#">adicione</a> a primeira.
                </article>
            @endforelse
        </div>
    </div>
</div>
