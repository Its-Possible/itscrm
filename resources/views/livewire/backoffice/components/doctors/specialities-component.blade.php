<div class="mt-4 mb-3">
    <div class="row">
        <div class="col-md-9">
            <h6 class="mt-2">Especialidade médica</h6>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-filter btn-small pull-right" wire:click="saveSpecialities">Guardar</button>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-10">
            <div class="form-group">
                <label for="user">Especialidade</label>
                <select class="form-control" wire:model="selected" name="speciality-select" id="speciality-select">
                    <option value="none" disabled selected>Selecionar</option>
                    @forelse($specialities as $speciality)
                        <option value="{{ $speciality->slug }}">{{ $speciality->name }}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <button wire:click="selectSpeciality" onclick="addSpecialityHandleClick()">Adicionar</button>
        </div>
    </div>
    <div id="app-doctors-specialities-selected">
        @forelse($doctorFromSpecialities as $key => $value)
            <button class="btn btn-filter speciality" wire:click="removeSpeciality('{{ $key }}')">
                {{ $value }}
                <i class="ri ri-close-line"></i>
            </button>
        @empty
            <small>Este médico não tem especialidades</small>
        @endforelse
        <input type="hidden" form="doctor-create" name="doctor-specialities" id="doctor-specialities" value="{{ json_encode($doctorFromSpecialities) }}" />
    </div>
</div>

