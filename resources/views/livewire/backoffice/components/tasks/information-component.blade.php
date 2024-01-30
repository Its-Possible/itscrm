<div>
    <div class="row mt-3">
        <div class="col-md-9">
            <h6 class="mt-2">Informações sobre automatização</h6>
        </div>
    </div>
    <hr />
    <div class="form-group">
        <label for="automation-username">Nome</label>
        <input class="form-control" type="text" placeholder="Nome da automatização" id="automation-name" name="name" form="automation-create" autocomplete="off" />
    </div>
    <div class="form-group">
        <label for="automation-email">Descrição</label>
        <textarea class="form-control" placeholder="Descrição" id="automation-description" name="email" form="automation-create" autocomplete="off"></textarea>
    </div>
    <div class="row mt-3">
        <div class="col-md-9">
            <h6 class="mt-2">Agendamento</h6>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="automation-select">Horas</label>
                <select form="automation-create" class="form-control" name="automation-select" id="automation-select">
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
                <select form="automation-create" class="form-control" name="automation-select" id="automation-select">
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
                <select form="automation-create" class="form-control" name="automation-select" id="automation-select">
                    <option value="none" disabled selected>Selecionar</option>
                    @for($second = 0; $second < 60; $second++)
                        <option value="{{ $second }}">{{ $second }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>
</div>
