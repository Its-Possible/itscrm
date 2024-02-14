<div x-data="schedules">
    <div class="row">
        <div class="col-md-9">
            <h6 class="mt-2">Horário do médico</h6>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-filter btn-small pull-right">Guardar</button>
        </div>
    </div>
    <hr/>
    <label for="user">Defina o horário semanal do médico</label>
    <div class="form-group" id="dayweek">
        @for($weekday = 1; $weekday <= 7; $weekday++)
            <button class="btn btn-schedule" :class="weekday.selected == {{ $weekday }} ? 'inverter' : ''"  x-on:click="weekday.selected = {{ $weekday }}"  wire:click="selectWeekdayEventHandler({{ $weekday }})">{{ weekday($weekday) }}</button>
        @endfor
    </div>
    @if($weekdaySelected > 0)
        <div class="form-group" id="times">
            <button class="btn btn-schedule" :class="schedules_select[{{ $weekdaySelected }}].includes('09:00 - 12:00') ? 'inverter' : ''" x-on:click.prevent="console.count()">09:00 - 12:00</button>
            <button class="btn btn-schedule" :class="schedules_select[{{ $weekdaySelected }}].includes('12:00 - 14:00') ? 'inverter' : ''" x-on:click.prevent="selectScheduleEventHandler('12:00 - 14:00')">12:00 - 14:00</button>
            <button class="btn btn-schedule" :class="schedules_select[{{ $weekdaySelected }}].includes('14:00 - 17:00') ? 'inverter' : ''" x-on:click.prevent="selectScheduleEventHandler('14:00 - 17:00')">14:00 - 17:00</button>
            <button class="btn btn-schedule" :class="schedules_select[{{ $weekdaySelected }}].includes('17:00 - 19:00') ? 'inverter' : ''" x-on:click.prevent="selectScheduleEventHandler('17:00 - 19:00')">17:00 - 19:00</button>
            <button class="btn btn-schedule" :class="schedules_select[{{ $weekdaySelected }}].includes('19:00 - 21:00') ? 'inverter' : ''" x-on:click.prevent="selectScheduleEventHandler('19:00 - 21:00')">19:00 - 21:00</button>
            <button class="btn btn-schedule" :class="schedules_select[{{ $weekdaySelected }}].includes('21:00 - 23:00') ? 'inverter' : ''" x-on:click.prevent="selectScheduleEventHandler('21:00 - 23:00')">21:00 - 23:00</button>
            <button class="btn btn-schedule {{ $scheduleTimerCustom ? 'inverter' : '' }}" wire:click="setCustomEventHandler()">Outro</button>
        </div>
    @endif
    @if($scheduleTimerCustom)
        <div class="form-group" id="timer-custom">
            @for($i = 0; $i < $quantityTimerCustom; $i++)
                <div class="mt-2">
                    <input class="form-control" type="text" placeholder="Horário de Entrada" id="doctor-start-{{ $i }}"/>
                </div>
                <div class="mt-2">
                    <input class="form-control" type="text" placeholder="Horário de Saída" id="doctor-end-{{ $i }}"/>
                </div>
                <div class="mt-2">
                    @if($i >npm r= 1)
                        <button class="btn btn-danger" wire:click="removeQuantityTimerCustom"><i class="ri ri-delete-bin-line"></i></button>
                    @endif
                </div>
            @endfor
        </div>
        <div class="row mt-2 mb-4">
            <div class="col-md-2">
                <button class="btn btn-filter" wire:click="addQuantityTimerCustom">Adicionar</button>
            </div>
        </div>
    @endif
</div>

@script
  <script>
      console.log("hello world");
  </script>
@endscript
