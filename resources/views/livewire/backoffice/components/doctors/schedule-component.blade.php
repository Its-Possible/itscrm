<div>
    <label for="user">Defina o horário semanal do médico</label>
    <div class="form-group" id="dayweek">
        <button class="btn btn-filter {{ in_array('Dom', $daysweekSelected) ? 'inverter' : '' }}"
                wire:click="setDaysweekSelected('Dom')">Domingo
        </button>
        <button class="btn btn-filter {{ in_array('Seg', $daysweekSelected) ? 'inverter' : '' }}"
                wire:click="setDaysweekSelected('Seg')">Segunda
        </button>
        <button class="btn btn-filter {{ in_array('Ter', $daysweekSelected) ? 'inverter' : '' }}"
                wire:click="setDaysweekSelected('Ter')">Terça
        </button>
        <button class="btn btn-filter {{ in_array('Qua', $daysweekSelected) ? 'inverter' : '' }}"
                wire:click="setDaysweekSelected('Qua')">Quarta
        </button>
        <button class="btn btn-filter {{ in_array('Qui', $daysweekSelected) ? 'inverter' : '' }}"
                wire:click="setDaysweekSelected('Qui')">Quinta
        </button>
        <button class="btn btn-filter {{ in_array('Sex', $daysweekSelected) ? 'inverter' : '' }}"
                wire:click="setDaysweekSelected('Sex')">Sexta
        </button>
        <button class="btn btn-filter {{ in_array('Sab', $daysweekSelected) ? 'inverter' : '' }}"
                wire:click="setDaysweekSelected('Sab')">Sábado
        </button>
    </div>
    @if(count($daysweekSelected) > 0)
        <div class="form-group" id="times">
            <button class="btn btn-filter {{ in_array('09:00 - 11:00', $timerSelected) ? 'inverter' : '' }}"
                    wire:click="setTimerSelected('09:00 - 11:00')">09:00 - 11:00
            </button>
            <button class="btn btn-filter {{ in_array('12:00 - 14:00', $timerSelected) ? 'inverter' : '' }}"
                    wire:click="setTimerSelected('12:00 - 14:00')">12:00 - 14:00
            </button>
            <button class="btn btn-filter {{ in_array('14:00 - 17:00', $timerSelected) ? 'inverter' : '' }}"
                    wire:click="setTimerSelected('14:00 - 17:00')">14:00 - 17:00
            </button>
            <button class="btn btn-filter {{ in_array('17:00 - 19:00', $timerSelected) ? 'inverter' : '' }}"
                    wire:click="setTimerSelected('17:00 - 19:00')">17:00 - 19:00
            </button>
            <button class="btn btn-filter {{ in_array('19:00 - 21:00', $timerSelected) ? 'inverter' : '' }}"
                    wire:click="setTimerSelected('19:00 - 21:00')">19:00 - 21:00
            </button>
            <button class="btn btn-filter {{ in_array('21:00 - 23:00', $timerSelected) ? 'inverter' : '' }}"
                    wire:click="setTimerSelected('21:00 - 23:00')">21:00 - 23:00
            </button>
            <button class="btn btn-filter {{ $custom ? 'inverter' : '' }}" wire:click="setCustom()">Outro</button>
        </div>
    @endif
    @if($custom)
        <div class="form-group" id="timer-custom">
            @for($i = 0; $i < $quantityTimerCustom; $i++)
                <div class="mt-2">
                    <input class="form-control" type="text" placeholder="Horário de Entrada"
                           id="doctor-start-{{ $i }}"/>
                </div>
                <div class="mt-2">
                    <input class="form-control" type="text" placeholder="Horário de Saída" id="doctor-end-{{ $i }}"/>
                </div>
                <div class="mt-2">
                    @if($i >= 1)
                        <button class="btn btn-danger" wire:click="removeQuantityTimerCustom"><i
                                class="ri ri-delete-bin-line"></i></button>
                    @endif
                </div>
            @endfor
        </div>
        <div class="row mt-2 mb-4">
            <div class="col-md-2">
                <button class="btn btn-filter" wire:click="addQuantityTimerCustom">Adicionar</button>
            </div>
        </div>
</div>
@endif
</div>