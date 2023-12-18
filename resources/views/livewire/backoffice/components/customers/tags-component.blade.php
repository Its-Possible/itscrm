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
                <select form="customer-create" class="form-control" wire:model="selected" name="campaign-select" id="campaign-select">
                    <option value="" disabled selected>Selecionar</option>
                    @if($campaigns)
                        @foreach($campaigns as $campaign)
                            <option value="{{ $campaign->slug }}">{{ $campaign->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="tags" class="form-group"></div>
            <div class="form-group">
                <label for="tag">Tags</label>
                @if($tags)
                <section id="tags-list">
                    <ul>
                        @foreach($tags as $tag)
                            <li wire:click.prevent="findAndRemove('{{ $tag->id }}')">{{ $tag->name }} <span><i class="ri-close-line"></i></span></li>
                        @endforeach
                    </ul>
                </section>
                @endif
                <section id="tag-input" class="mt-4">
                    <input type="text" class="form-control" name="tag" wire:model="value" wire:keyup="search" wire:keydown.enter="addOrCreate" />
                    @if($suggestions)
                        <nav id="tags-suggestions">
                            <ul>
                                @foreach($suggestions as $suggestion)
                                    <li wire:click.prevent="addOrCreate('{{ $suggestion->slug }}')">{{ $suggestion->name }}</li>
                                @endforeach
                            </ul>
                        </nav>
                    @endif
                </section>
            </div>
        </div>
    </div>
</div>
