<div>
    <nav id="app-navigation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <ul>
                        <li class="@if(Route::current()->getName() === 'its.app.alerts') active @endif">
                            Alertas
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </li>
                        <li class="@if(Route::current()->getName() === 'its.app.statistics') active @endif">
                            <a href="{{ route('its.app.statistics') }}">
                                Estatísticas
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">4
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>

                        </li>
                        <li class="@if(Route::current()->getName() === 'its.app.campaigns') active @endif">Campanhas</li>
                        <li class="@if(Route::current()->getName() === 'its.app.leads') active @endif">Leads</li>
                        <li class="@if(Route::current()->getName() === 'its.app.mails') active @endif">
                            <a href="{{ route('its.app.mails.index') }}">
                                E-mails
                            </a>
                        </li>
                        <li class="@if(Route::current()->getName() === 'its.app.customers.index') active @endif">
                            <a href="{{ route('its.app.customers.index') }}">
                                Clientes
                            </a>
                        </li>
                        <li class="@if(Route::current()->getName() === 'its.app.projects') active @endif">Projetos
                        </li>
                        <li class="@if(Route::current()->getName() === 'its.app.services') active @endif">Serviços

                        </li>
                    </ul>
                </div>
                <div wire:loading.delay.shortest>...</div>
                @switch(Route::current()->getName())
                    @case('its.app.statistics')
                        <div class="row">
                            <livewire:backoffice.components.app-statistics-component />
                        </div>
                        @break
                    @case('its.app.mails')
                        <div class="row">
                            <livewire:backoffice.components.app-mails-component />
                        </div>
                        @break
                    @case('its.app.customers.index')
                        <div class="row">
                            <livewire:backoffice.components.app-customers-component />
                        </div>
                        @break
                @endswitch
            </div>
        </div>
    </nav>
</div>
