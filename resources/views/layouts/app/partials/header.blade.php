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
                Tens 5 novas <strong>mensagens</strong></button>
        </div>
        <div id="app-main-logged-notifications">
            <label>
                <i class="ri ri-notification-line"></i>
            </label>
        </div>
        <div id="app-main-logged-avatar">
           <img src="https://img.freepik.com/premium-vector/portrait-young-man-with-beard-hair-style-male-avatar-vector-illustration_266660-423.jpg?w=2000" />
        </div>
    </section>
</header>