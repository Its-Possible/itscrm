<div>
    <div class="row mt-3">
        <div class="col-md-9">
            <h6 class="mt-2">Repetições</h6>
        </div>
        <div class="col-md-3">
            <div class="btn-group" role="group" aria-label="repetitions">
                <input type="radio" class="btn-check" name="automation-repeat" id="automation-repeat-on" autocomplete="off" value="on" wire:model="repeat" checked>
                <label class="btn btn-primary" for="automation-repeat-on">Repetir</label>

                <input type="radio" class="btn-check" name="automation-repeat" id="automation-repeat-off" autocomplete="off" value="off" wire:model="repeat">
                <label class="btn btn-primary" for="automation-repeat-off">Não repetir</label>
            </div>
        </div>
    </div>
    <hr />
    @if($repeat === "on")
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="automation-select">Frequência</label>
                <select form="automation-create" class="form-control" name="automation-select" id="automation-select" wire:model="repetition">
                    <option value="none" disabled selected>Selecionar</option>
                    <option value="daily">Diariamente</option>
                    <option value="weekly">Semanalmente</option>
                    <option value="annually">Anualmente</option>
                    <option value="same-day">No mesmo dia</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        @if($repetition === "same-day")
        <div class="col-md-4">
            <div class="form-group">
                <label for="automation-select">Horas</label>
                <select form="automation-create" class="form-control" name="automation-select-hours" id="automation-select-hours">
                    <option value="none" disabled selected>Selecionar</option>
                    @for($hour = 0; $hour <= 12; $hour++)
                        <option value="{{ $hour }}">{{ $hour }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="automation-select">Minutos</label>
                <select form="automation-create" class="form-control" name="automation-select-minutes" id="automation-select-minutes">
                    <option value="none" disabled selected>Selecionar</option>
                    @for($minute = 0; $minute < 60; $minute++)
                        <option value="{{ $minute }}">{{ $minute }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="automation-select">Segundos</label>
                <select form="automation-create" class="form-control" name="automation-select-seconds" id="automation-select-seconds">
                    <option value="none" disabled selected>Selecionar</option>
                    @for($second = 0; $second < 60; $second++)
                        <option value="{{ $second }}">{{ $second }}</option>
                    @endfor
                </select>
            </div>
        </div>
        @endif
    </div>
    @endif
</div>
