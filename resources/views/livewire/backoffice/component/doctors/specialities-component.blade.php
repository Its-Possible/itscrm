<div>
    <div id="app-doctors-specialities-selected">
        @forelse($specialities_selected as $key => $selected)
            {{ $key }},
        @empty

        @endforelse
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <label for="user">Especialidade</label>
                <select class="form-control" wire:model="select_value" name="user" id="user">
                    <option disabled selected>Selecionar</option>
                    @forelse($specialities as $speciality)
                        <option value="{{ $speciality }}">{{ $speciality->name }}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <button wire:click="selectSpeciality">Adicionar</button>
        </div>
    </div>
</div>
