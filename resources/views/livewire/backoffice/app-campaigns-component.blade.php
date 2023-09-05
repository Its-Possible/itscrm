<div>
    <div class="row mb-4" x-data="customers">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Campanhas</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <button class="btn btn-filter" wire:click="import">Importar</button>
            <a class="btn btn-filter" href="{{ route('its.app.campaigns.create') }}">Nova campanha</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="col-md-10">
                    <button class="btn btn-filter">Adicionar filtro <i class="ri-add-fill ml-2"></i></button>
{{--                    <button class="btn btn-filter"><span>Tag:</span> Filiado <i class="ri-close-fill ml-2"></i></button>--}}
{{--                    <button class="btn btn-filter"><span>Tipo:</span> Pessoa <i class="ri-close-fill ml-2"></i></button>--}}
{{--                    <button class="btn btn-filter"><span>Pais:</span> Portugal & Estados Unidos--}}
{{--                        <i class="ri-close-fill ml-2"></i>--}}
{{--                    </button>--}}
                </div>
                <div class="col-md-2 text-right pt-3">{{ $campaignsCounter }} Encontrados</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2">
            <table id="its-app-users-table" class="table table-light">
                <thead>
                <tr>
                    <th><input type="checkbox" id="its-app-users-all" value="all"/></th>
                    <th>Campanha</th>
                    <th>Importado em</th>
                    <th>Importado de</th>
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
                @forelse($campaigns as $index => $campaign)
                    <tr data-index="{{ $index }}">
                        <td><input type="checkbox" id="its-app-users-all" value="{{ $index }}"/></td>
                        <td class="text-bold">{{ $campaign->name }}</td>
                        <td class="text-bold">{{ date('D d M, H:i', strtotime($campaign->created_at)) }}</td>
                        <td class="text-bold">{{ ucfirst($campaign->local) }}</td>
                        <td>
                            @forelse($campaign->tags as $tag)
                                <span class="badge rounded-pill" style="background-color: {{ $tag->color }};">{{ $tag->name }}</span>
                            @empty
                                Sem tags
                            @endforelse
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
                                    <a class="dropdown-item" href="{{ route('its.app.campaigns.show', $campaign->code) }}">Ver</a>
                                    <a class="dropdown-item" href="{{ route('its.app.campaigns.edit', $campaign->code) }}">Editar</a>
                                    <hr class="dropdown-divider" />
                                    <a class="dropdown-item text-danger" wire:click="delete('{{ $campaign->code }}')">Apagar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-3">Neste momento não temos qualquer campanha registada!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-8 offset-2">
        </div>
    </div>
</div>
