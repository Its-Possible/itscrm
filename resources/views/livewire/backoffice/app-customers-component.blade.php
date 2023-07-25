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
    <div class="row mb-3">
        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="col-md-10">
                    <button class="btn btn-filter">Add filtro <i class="ri-add-fill ml-2"></i></button>
                    <button class="btn btn-filter"><span>Tag:</span> Filiado <i class="ri-close-fill ml-2"></i></button>
                    <button class="btn btn-filter"><span>Tipo:</span> Pessoa <i class="ri-close-fill ml-2"></i></button>
                    <button class="btn btn-filter"><span>Pais:</span> Portugal & Estados Unidos<i
                            class="ri-close-fill ml-2"></i></button>
                </div>
                <div class="col-md-2 text-right pt-3">
                    {{ $customers_counter }} Encontrados
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2">
            <table id="its-app-users-table" class="table table-light">
                <thead>
                <tr>
                    <th><input type="checkbox" id="its-app-users-all" value="all"/></th>
                    <th>Cliente</th>
                    <th>Empresa</th>
                    <th>Último login</th>
                    <th>Tags</th>
                    <th>Estado</th>
                    <th>
                        <button class="btn btn-transparent">
                            <i class="ri ri-more-fill"></i>
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($customers as $index => $customer)
                    <tr data-index="{{ $index }}">
                        <td><input type="checkbox" id="its-app-users-all" value="{{ $index }}"/></td>
                        <td class="text-bold">
                            <img src="{{ $customer->avatar }}" width="60"/>
                            {{ decrypt_data($customer->name) }}
                            <small>&lt;{{ decrypt_data($customer->email) }}&gt;</small>
                        </td>
                        <td class="text-bold">Empresa</td>
                        <td class="text-bold">{{ date('D d M, H:i') }}</td>
                        <td>
                            <span class="badge rounded-pill text-bg-secondary">Aniversário</span>
                            <span class="badge rounded-pill text-bg-warning">Ouro</span>
                            <span class="badge rounded-pill text-bg-danger">Filiado</span>
                        </td>
                        <td>
                            <span class="badge rounded-pill text-bg-success">Activo</span>
                        </td>
                        <td class="text-bold">
                            <div class="dropdown show">
                                <a class="btn btn-transparent inverter" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri ri-more-fill"></i>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Ver</a>
                                    <a class="dropdown-item" href="#">Editar</a>
                                    <hr class="dropdown-divider" />
                                    <a class="dropdown-item text-danger" href="#">Apagar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-3">Neste momento não temos qualquer cliente registado!
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-8 offset-2">
        </div>
    </div>

    @if($modal)
        <section id="its-app-customers-import">
            <div id="its-app-customers-import-content">
                <header id="its-app-customers-import-content-header">
                    <h2>Importar os clientes</h2>
                </header>
                <div class="its-app-customers-import-content-container">
                    <p>
                        Apenas ficheiros csv, é que podem ser importados para carregar corretamente os dados dos clientes
                    </p>
                    <form wire:submit.prevent="save">
                        @error('files.*') <span class="error">{{ $message }}</span>@enderror
                        <input type="file" class="form-control" form="import" wire:model="files"
                               accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                               multiple />
                        <button type="submit">Carregar</button>
                    </form>

                </div>
            </div>
        </section>
    @endif
</div>
