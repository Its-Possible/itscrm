<div class="container">
    <header id="app-authenticate-user-header">
        <div id="app-authenticate-user-header-avatar">
            <img src="{{ asset('images/' . $user->avatar) }}" alt="{{ decrypt_data($user->firstname) }} {{ decrypt_data($user->lastname) }}">
        </div>
        <div id="app-authenticate-user-header-info">
            <h4>{{ decrypt_data($user->firstname) }} {{ decrypt_data($user->lastname) }}</h4>
            <p>{{ $user->email }}</p>
        </div>
    </header>
    <section>
        <div class="row">
            <div class="col-md-1 offset-3">
                <button class="btn btn-default ml-3"><i class="ri ri-facebook-box-fill ri-2x"></i></button>
            </div>
            <div class="col-md-1">
                <button class="btn btn-default ml-3"><i class="ri ri-twitter-fill ri-2x"></i></button>
            </div>
            <div class="col-md-1">
                <button class="btn btn-default ml-3"><i class="ri ri-google-fill ri-2x"></i></button>
            </div>
            <div class="col-md-1">
                <button class="btn btn-default ml-3"><i class="ri ri-instagram-fill ri-2x"></i></button>
            </div>
        </div>
    </section>
</div>
