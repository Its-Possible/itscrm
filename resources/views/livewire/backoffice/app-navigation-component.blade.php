<div>
    <nav id="app-navigation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-1">
                    <ul>
                        <li class="@if($page === 'alerts') active @endif" wire:click="setPage('alerts')">
                            Alerts
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </li>
                        <li class="@if($page === 'statistics') active @endif" wire:click="setPage('statistics')">
                            Statístics
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">4
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </li>
                        <li class="@if($page === 'leads') active @endif" wire:click="setPage('leads')">Leads</li>
                        <li class="@if($page === 'mails') active @endif" wire:click="setPage('mails')">E-mails</li>
                        <li class="@if($page === 'customers') active @endif" wire:click="setPage('customers')">
                            Customers
                        </li>
                        <li class="@if($page === 'projects') active @endif" wire:click="setPage('projects')">Projects
                        </li>
                        <li class="@if($page === 'services') active @endif" wire:click="setPage('services')">Services
                        </li>
                    </ul>
                </div>
                <div wire:loading.delay.shortest>...</div>
                @switch($page)
                    @case('statistics')
                        <div wire:loading.remove>
                            <div class="row">
                                <livewire:backoffice.components.app-statistics-component/>
                            </div>
                        </div>
                        @break
                @endswitch
            </div>
        </div>
    </nav>
</div>
