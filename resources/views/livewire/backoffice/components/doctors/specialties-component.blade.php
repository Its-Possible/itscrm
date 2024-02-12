<div class="mt-4 mb-3">
    <div class="row">
        <div class="col-md-9">
            <h6 class="mt-2">Especialidade médica</h6>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-filter btn-small pull-right" wire:click="saveSpecialities">Guardar
            </button>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-10">
            @if($specialties)
                <div class="form-group">
                    <label for="">Especialidade</label>
                    <select class="form-control" wire:model="selected" name="speciality-select" id="speciality-select">
                        <option value="none" disabled selected>Selecionar</option>
                        @foreach($specialties as $key => $specialty)
                            <option wire:key="{{ $key }}" value="{{ $specialty->slug }}">{{ $specialty->name }}</option>
                        @endforeach

                    </select>
                </div>
            @endif
        </div>
        <div class="col-md-2">
            <button class="btn btn-filter mt-5" wire:click="specialtyAddEvent" onclick="addSpecialityHandleClick()">Adicionar</button>
        </div>
    </div>
    <div id="app-doctors-specialities-selected">
        @forelse($specialtiesListSelected as $key => $value)
            <button class="btn btn-filter speciality" wire:click="specialtyRemoveEvent('{{ $key }}')">{{ $value }} <i class="ri ri-close-line"></i></button>
        @empty
            <small>Este médico não tem especialidades</small>
        @endforelse
        <input type="hidden" form="doctor-create" name="doctor-specialities" id="doctor-specialities" value="{{ json_encode($specialtiesListSelected) }}" />
    </div>
</div>

