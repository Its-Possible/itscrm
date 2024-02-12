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
            <button class="btn btn-schedule" :class="weekday.selected == {{ $weekday }} ? 'inverter' : ''"  x-on:click="weekday.selected = {{ $weekday }}"  wire:click="weekdaySelectEvent({{ $weekday }})">{{ weekday($weekday) }}</button>
        @endfor
    </div>
    @if($weekdaySelected > 0)
        <div class="form-group" id="times">
            <button class="btn btn-filter" x-on:click="selectSchedule('09:00 - 11:00')" wire:click="weekdayTimerSelected('09:00 - 11:00')">09:00 - 11:00</button>
            <button class="btn btn-filter" x-on:click="selectSchedule('12:00 - 14:00')"  wire:click="weekdayTimerSelected('12:00 - 14:00')">12:00 - 14:00</button>
            <button class="btn btn-filter" x-on:click="selectSchedule('14:00 - 17:00')"  wire:click="weekdayTimerSelected('14:00 - 17:00')">14:00 - 17:00</button>
            <button class="btn btn-filter" x-on:click="selectSchedule('17:00 - 19:00')"  wire:click="weekdayTimerSelected('17:00 - 19:00')">17:00 - 19:00</button>
            <button class="btn btn-filter" x-on:click="selectSchedule('19:00 - 21:00')"  wire:click="weekdayTimerSelected('19:00 - 21:00')">19:00 - 21:00</button>
            <button class="btn btn-filter" x-on:click="selectSchedule('21:00 - 23:00')"  wire:click="weekdayTimerSelected('21:00 - 23:00')">21:00 - 23:00</button>
            <button class="btn btn-filter {{ $custom ? 'inverter' : '' }}" wire:click="setCustom()">Outro</button>
        </div>
    @endif
</div>
</div>
