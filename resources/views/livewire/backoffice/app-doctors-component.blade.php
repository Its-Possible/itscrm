<div>
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Médicos</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('its.app.doctors.create') }}">Adicionar médico</a>
            <button class="btn btn-filter" wire:click="$set('modal', true)">Importar</button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="col-md-10">
                    <button class="btn btn-filter">Adicionar filtro</button>
                </div>
                <div class="col-md-2 text-right pt-3">
                    {{ $doctors_counter }} Encontrados
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 font-bold row-border-radius">
            <section id="app-list-header">
                <div>Médico</div>
                <div>Especialidades</div>
                <div>Estado</div>
                <div>Ações</div>
            </section>
        </div>
        <div class="col-md-8 offset-2">
            @forelse($doctors as $index => $doctor)
                <article class="app-customer">
                    <div><img class="app-customer-avatar" src="{{ $doctor->user->avatar }}" /></div>
                    <div>
                        <div class="text-bold">{{ decrypt_data($doctor->user->firstname) }} {{ decrypt_data($doctor->user->lastname) }}</div>
                        <div><small>{{ $doctor->email }}</small></div>
                    </div>
                    <div>
                        @php $xindex = 0 @endphp
                        @forelse($doctor->specialities as $speciality)
                            @php $xindex++ @endphp
                            {{ $speciality->name }}
                            @if($xindex < count($doctor->specialities))
                                ,
                            @endif
                        @empty
                           <small>Sem especialidade</small>
                        @endforelse
                    </div>
                    <div>
                        <span class="badge badge-success bg-success">
                            <i class="ri ri-check"></i>
                            Ativo
                        </span>
                    </div>
                    <div>
                        <a class="btn btn-transparent" href="{{ route('its.app.doctors.show', $doctor->id) }}">
                            <i class="ri ri-eye-line"></i>
                        </a>
                        <a class="btn btn-transparent" href="{{ route('its.app.doctors.edit', $doctor->id) }}">
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
                    Não há médicos registados, <a href="{{ route('its.app.doctors.create') }}">adicione</a> o primeiro.
                </article>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const btnsAddTag = document.querySelectorAll('.app-components-tags-add');

        btnsAddTag.forEach((btnAddTag) => {
            btnAddTag.addEventListener("click", function () {
                this.innerHTML = '<input type="text" id="app-component-tags-add-value" value="teste" />';
            });
        });
    </script>
    @endpush
</div>
