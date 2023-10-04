<div>
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Clientes</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('its.app.customers.create') }}">Adicionar Cliente</a>
            <button class="btn btn-filter" wire:click="$set('modal', true)">Importar</button>
        </div>
    </div>
    @if(session()->has('its.message.body'))
        <div class="row">
            <div class="col-12">
                <div class="alert text-center @if(session('its.message.type') == 'warning') alert-warning @elseif('its.message.type' == 'danger') alert-danger @else alert-success @endif">{{ session('its.message.body') }}</div>
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="col-md-10">
                    <button class="btn btn-filter">Add filtro <i class="ri-add-fill ml-2"></i></button>
                </div>
                <div class="col-md-2 text-right pt-3">
                    {{ $customers_counter }} Encontrados
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 font-bold row-border-radius">
            <section id="app-list-header">
                <div>Cliente</div>
                <div>Tags</div>
                <div>Estado</div>
                <div>Ações</div>
            </section>
        </div>
        <div class="col-md-8 offset-2">
            @forelse($customers as $index => $customer)
                <article class="app-customer">
                    <div><img class="app-customer-avatar" src="{{ $customer->avatar->image }}" /></div>
                    <div>
                        <div class="text-bold">{{ decrypt_data($customer->name) }}</div>
                        <div><small>{{ decrypt_data($customer->email) }}</small></div>
                    </div>
                    <div>
                        @forelse($customer->tags() as $tag)
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
                        <a class="btn btn-transparent" href="{{ route('its.app.customers.show', $customer->slug) }}">
                            <i class="ri ri-eye-line"></i>
                        </a>
                        <a class="btn btn-transparent" href="{{ route('its.app.customers.edit', $customer->slug) }}">
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
                    Não há clientes registados, <a href="#">adicione</a> o primeiro.
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
