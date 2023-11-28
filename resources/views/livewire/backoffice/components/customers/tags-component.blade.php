<div class="mt-4 mb-3">
    <div class="row">
        <div class="col-md-9">
            <h6 class="mt-2">Campanhas & Tags</h6>
        </div>
        <div class="col-md-3">
            @if(!is_null($customer))
            <button type="button" class="btn btn-filter btn-small pull-right" wire:click="saveTags">Guardar</button>
            @endif
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-12">
            <div id="tags" class="form-group"></div>
            <div class="form-group">
                <label for="campaign-select">Campanha</label>
                <select form="customer-create" class="form-control" wire:model="selected"  name="campaign-select" id="campaign-select">
                    <option value="" disabled selected>Selecionar</option>
                    @forelse($campaigns as $campaign)
                        <option value="{{ $campaign->slug }}">{{ $campaign->name }}</option>
                    @empty

                    @endforelse
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="tags" class="form-group"></div>
            <div class="form-group">
                <label for="tag">Tags</label>
                <input id="input-tag" type="text" class="form-control" wire:model="tag"  />
            </div>
        </div>
    </div>
</div>
