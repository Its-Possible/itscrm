<header id="app-main-header">

    <section id="app-main-search">
        <label for="app-main-search">
            <i class="ri ri-search-line"></i>
        </label>
        <input id="app-main-search" name="app-main-search" type="text" placeholder="Pesquise por qualquer coisa" />
    </section>
    <!-- Real datetime -->
    <section id="app-main-datetime">
        <label><i class="ri ri-calendar-2-line"></i></label>
        Hoje, <strong>{{ date_format_trans('M d') }}</strong>
    </section>

    <!-- User logged info -->
    <section id="app-main-logged">
        <div id="app-main-logged-messages">
            <button>
                <label><i class="ri ri-mail-line"></i></label>
                @if(count(auth()->user()->messages) > 0)
                Tens {{  count(auth()->user()->messages) }} novas <strong>mensagens</strong>
                @else
                    Sem mensagens novas
                @endif
            </button>
        </div>
        <div id="app-main-logged-notifications">
            <label id="app-main-logged-notifications-label">
                <i class="ri ri-notification-line"></i>
                {{ notifications("counter") }}
            </label>
            <div id="app-main-logged-notifications-content">
                @foreach($notifications as $notification)
                @endforeach
            </div>
        </div>
        <div id="app-main-logged-avatar">
           <img src="{{ auth()->user()->avatar->image }}" />
        </div>
    </section>
</header>
