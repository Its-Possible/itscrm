<header id="app-sidebar-header">
    <div id="app-brand">
        <a href="{{  route('its.app.home') }}">
            <img src="https://media.istockphoto.com/id/1348342862/pt/vetorial/gorilla-logo-design-template-inspiration-idea-concept.jpg?s=612x612&w=0&k=20&c=1ecwGVO8LRR9JfS4UoK0xCfZAeUxf_IkhZSHgG8TeLE=" />
        </a>
    </div>
</header>

<nav id="app-sidebar-nav">
    <ul>
        <li class="nav-item">
            <a href="{{ route('its.app.home') }}">
                <i class="ri ri-home-line"></i>
                <p>Inicio</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('its.app.messages.index') }}">
                <i class="ri ri-chat-3-line"></i>
                <p>Mensagens</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('its.app.customers.index') }}">
                <i class="ri ri-user-line"></i>
                <p>Clientes</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('its.app.campaigns.index') }}">
                <i class="ri ri-mail-line"></i>
                <p>Campanhas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('its.app.doctors.index') }}">
                <i class="ri ri-nurse-line"></i>
                <p>Médicos</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('its.app.specialities.index') }}">
                <i class="ri-stethoscope-line"></i>
                <p>Especialidades</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('its.app.users.index') }}">
                <i class="ri ri-group-line"></i>
                <p>Utilizadores</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('its.app.users.index') }}">
                <i class="ri ri-folder-line"></i>
                <p>Ficheiros</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('its.app.settings.index') }}">
                <i class="ri ri-settings-line"></i>
                <p>Definições</p>
            </a>
        </li>
    </ul>
</nav>
