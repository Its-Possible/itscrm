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
            <button @class(['btn btn-schedule' => true, 'inverter' => $weekday === $weekdaySelected, 'activated' => isset($timersSelected[$weekday])]) wire:click="changeSelectWeekdayClickEvent({{ $weekday }})">{{ weekday($weekday) }}</button>
        @endfor
    </div>
    @if($weekdaySelected >= 1 && $weekdaySelected <= 7)
        <div class="form-group" id="times">
            @foreach($timers as $key => $timer)
                <button @class(['btn btn-schedule' => true, 'inverter' => in_array($timer, $this->timersSelected[$this->weekdaySelected])]) wire:click="changeTimerPerWeekdayClickEvent({{ $key }})">{{ $timer }}</button>
             @endforeach
            <button @class(['btn btn-schedule' => true])>Outro</button>
        </div>

        <div class="form-group pull-right">
            <button class="text-danger" wire:click="showConfirmModalEvent('cancel-and-delete', true)">
                <i class="ri ri-delete-bin-2-line"></i> Limpar a seleção
            </button>
        </div>
    @endif
    {{ json_encode($timersSelected) }}

    @if($confirmModalDelete)
        <div>
            <livewire:components.modal-component
                title="Atenção - Deseja mesmo apagar?"
                message="A opção escolhida vai apagar todos os periodos selecionados, por si, <strong>deseja mesmo apagar</strong>?"
                actions="cancelanddelete"
                wire:transition.opacity
            />
        </div>
    @endif
</div>
