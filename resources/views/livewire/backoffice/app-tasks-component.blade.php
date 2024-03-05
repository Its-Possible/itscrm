@php use App\Helpers\Interfaces\TaskInterface; @endphp
<div x-data="tasks">
    <div class="row mb-4">
        <div class="col-md-5 offset-2">
            <h1 class="mt-3 mb-3">Tarefas agendadas</h1>
        </div>
        <div class="col-md-3 text-right pt-3">
            <a class="btn btn-filter inverter" href="{{ route('app.tasks.create') }}">Criar tarefa</a>
        </div>
    </div>
    @if(session()->has('its.message.body'))
        <div class="row">
            <div class="col-12">
                <div
                    class="alert text-center @if(session('message.type') == 'warning') alert-warning @elseif('message.type' == 'danger') alert-danger @else alert-success @endif">{{ session('message.body') }}</div>
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-md-8 offset-2">
            <div class="row">
                <div class="col-md-10">
                    <button class="btn btn-filter">Adicionar filtro <i class="ri-add-fill ml-2"></i></button>
                </div>
                <div class="col-md-2 text-right pt-3">
                    {{ $counter }} Encontrados
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2 font-bold row-border-radius">
            <section id="app-tasks-header">
                <div>Nome</div>
                <div>Descrição</div>
                <div>Estado</div>
                <div>Ações</div>
            </section>
        </div>
        <div class="col-md-8 offset-2">
            @forelse($tasks as $index => $task)
                <article class="app-task">
                    <div>
                        <div class="text-bold">{{ $task->name }}</div>
                    </div>
                    <div>
                        <p>Enviar todos emails de aniversário</p>
                    </div>
                    <div>
                        @switch($task->status)
                            @case(TaskInterface::STATUS_RUNNING)
                                <span class="badge badge-success bg-success">
                                    A executar ...
                                </span>
                                @break
                            @case(TaskInterface::STATUS_WAITING)
                                <span class="badge badge-warning bg-warning">
                                    Em espera
                                </span>
                                @break
                            @case(TaskInterface::STATUS_PAUSED)
                                <span class="badge badge-warning bg-warning">
                                    Em pausa
                                </span>
                                @break
                            @case(TaskInterface::STATUS_STOPPED)
                                <span class="badge badge-danger bg-danger">
                                    Parado
                                </span>
                                @break
                        @endswitch
                    </div>
                    <div>
                        @switch($task->status)
                            @case(TaskInterface::STATUS_RUNNING)
                                <button class="btn btn-transparent" href="{{ route('its.app.customers.edit.blade.php', $task->slug) }}">
                                    <i class="ri ri-pause-line"></i>
                                </button>
                                <button class="btn btn-transparent" href="{{ route('its.app.customers.edit.blade.php', $task->slug) }}">
                                    <i class="ri ri-stop-line"></i>
                                </button>
                                @break
                            @case(TaskInterface::STATUS_WAITING)
                                <button class="btn btn-transparent" href="{{ route('its.app.customers.edit.blade.php', $task->slug) }}">
                                    <i class="ri ri-pause-line"></i>
                                </button>
                                <button class="btn btn-transparent" href="{{ route('its.app.customers.edit.blade.php', $task->slug) }}">
                                    <i class="ri ri-stop-line"></i>
                                </button>
                                @break
                            @case(TaskInterface::STATUS_PAUSED)
                                <button class="btn btn-transparent" href="{{ route('its.app.customers.edit.blade.php', $task->slug) }}">
                                    <i class="ri ri-play-line"></i>
                                </button>
                                <button class="btn btn-transparent" href="{{ route('its.app.customers.edit.blade.php', $task->slug) }}">
                                    <i class="ri ri-stop-line"></i>
                                </button>
                                @break
                            @case(TaskInterface::STATUS_STOPPED)
                                <button class="btn btn-transparent" href="{{ route('its.app.customers.edit.blade.php', $task->slug) }}">
                                    <i class="ri ri-information-line"></i>
                                </button>
                                <button class="btn btn-transparent" href="{{ route('its.app.customers.edit.blade.php', $task->slug) }}">
                                    <i class="ri ri-play-line"></i>
                                </button>
                                @break
                        @endswitch
                        <button class="btn btn-transparent text-danger" wire:click="delete('{{ $task->slug }}')">
                            <i class="ri ri-delete-bin-line"></i>
                        </button>
                    </div>
                </article>
            @empty
            @endforelse
        </div>
    </div>
</div>

