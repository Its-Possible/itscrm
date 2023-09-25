<div class="mt-4 mb-3">
    <div class="row">
        <div class="col-md-9">
            <h6 class="mt-2">Especialidades e Médicos</h6>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-filter btn-small pull-right" wire:click="saveSpecialities">Guardar</button>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="user">Especialidade</label>
                <select class="form-control" wire:model="selected" wire:click="updateDoctorsFromSpeciality" name="speciality-select" id="speciality-select">
                    <option value="none" disabled selected>Selecionar</option>
                    @forelse($specialities as $speciality)
                        <option value="{{ $speciality->slug }}">{{ $speciality->name }}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
    </div>
    @if(count($doctors) > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="user">Médico</label>
                <select class="form-control" wire:model="selected" wire:click="updateDoctorsFromSpeciality" name="speciality-select" id="speciality-select">
                    <option value="none" disabled selected>Selecionar</option>
                    @forelse($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ decrypt_data($doctor->user->firstname) }} {{ decrypt_data($doctor->user->lastname) }}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
        @endif
    </div>
</div>

