<div>
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <label for="user">Especialidade</label>
                <select class="form-control" wire:model="selected" name="user" id="user">
                    <option value="none" disabled selected>Selecionar</option>
                    @forelse($specialities as $speciality)
                        <option value="{{ $speciality->slug }}">{{ $speciality->name }}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <button wire:click="selectSpeciality">Adicionar</button>
        </div>
    </div>
    <div id="app-doctors-specialities-selected">
        @forelse($doctorFromSpecialities as $key => $value)
            <button class="btn btn-filter" wire:click="removeSpeciality('{{ $key }}')">
                {{ $value }}
                <i class="ri ri-close-line"></i>
            </button>
        @empty

        @endforelse
    </div>
</div>
