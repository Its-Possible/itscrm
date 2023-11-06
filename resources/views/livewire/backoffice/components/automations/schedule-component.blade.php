<div>
    <div class="row mt-3">
        <div class="col-md-9">
            <h6 class="mt-2">Repetições</h6>
        </div>
    </div>
    <hr />
    <div class="col-md-12">
        <div class="form-group">
            <label for="automation-select">Frequência</label>
            <select form="automation-create" class="form-control" name="automation-select" id="automation-select">
                <option value="none" disabled selected>Selecionar</option>
                <option value="daily">Diariamente</option>
                <option value="weekly">Semanalmente</option>
                <option value="annually">Anualmente</option>
                <option value="same-day">No mesmo dia</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="automation-email">Descrição</label>
        <textarea class="form-control" type="email" placeholder="E-mail" id="automation-description" name="email" form="automation-create" autocomplete="off"></textarea>
    </div>
</div>
