<div>
    <div class="row mt-3">
        <div class="col-md-9">
            <h6 class="mt-2">Informações do médico</h6>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-filter btn-small pull-right">Guardar</button>
        </div>
    </div>
    <hr />
    <div class="form-group">
        <label for="doctor-username">Utilizador</label>
        <select class="form-control" name="username" id="doctor-username" form="doctor-create" wire:model="username" wire:change="changeSelectUsername">
            <option disabled selected>Selecionar</option>
            @forelse($users as $user)
                <option value="{{ $user->username }}">{{ decrypt_data($user->firstname) }} {{ decrypt_data($user->lastname) }}</option>
            @empty
                <option value="-">Não há utilizadores registados</option>
            @endforelse
        </select>
    </div>
    <div class="form-group">
        <label for="doctor-email">E-mail</label>
        <input class="form-control" type="email" placeholder="E-mail" id="doctor-email" name="email" form="doctor-create" autocomplete="off" wire:change="emailChangeEventHandler" wire:model="email" />
    </div>

    <div class="form-group">
        <label for="doctor-mobile">Telemóvel</label>
        <input class="form-control" x-mask="999 999 999" type="text" placeholder="Telemóvel" id="doctor-mobile" name="mobile" form="doctor-create" />
    </div>
</div>

@script
<script>
    $wire.on('email-unique-error', (email) => {
        
    });
</script>
@endscript
