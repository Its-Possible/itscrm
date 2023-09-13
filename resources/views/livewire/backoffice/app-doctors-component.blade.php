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
                    {{--                    <button class="btn btn-filter"><span>Tag:</span> Filiado <i class="ri-close-fill ml-2"></i></button>--}}
                    {{--                    <button class="btn btn-filter"><span>Tipo:</span> Pessoa <i class="ri-close-fill ml-2"></i></button>--}}
                    {{--                    <button class="btn btn-filter"><span>Pais:</span> Portugal & Estados Unidos<i class="ri-close-fill ml-2"></i></button>--}}
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
                <div></div>
                <div>Estado</div>
                <div>Ações</div>
            </section>
        </div>
        <div class="col-md-8 offset-2">
            @forelse($doctors as $index => $doctor)
                <article class="app-customer">
                    <div><img class="app-customer-avatar" src="{{ $doctor->avatar }}" /></div>
                    <div>
                        <div class="text-bold">{{ decrypt_data($doctor->name) }}</div>
                        <div><small>{{ decrypt_data($doctor->email) }}</small></div>
                    </div>
                    <div>
                        @forelse($doctor->tags() as $tag)
                            teste
                        @empty
                            <span>Adicionar tag</span>
                        @endforelse
                    </div>
                    <div>
                        <span class="badge badge-success bg-success">
                            <i class="ri ri-check"></i>
                            Ativo
                        </span>
                    </div>
                    <div>
                        <a class="btn btn-transparent" href="{{ route('its.app.doctors.show', $customer->slug) }}">
                            <i class="ri ri-eye-line"></i>
                        </a>
                        <a class="btn btn-transparent" href="{{ route('its.app.doctors.edit', $customer->slug) }}">
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

    <!-- Temporarily -->
    <section class="app-modal" id="app-customers-import">
        <livewire:backoffice.components.app-upload-component />
    </section>

    @if($modal)

    @endif
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