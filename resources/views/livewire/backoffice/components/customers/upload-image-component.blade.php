<div x-data="customers">
    <div class="row mt-3">
        <div class="col-md-9">
            <h6 class="mt-2">Avatar do cliente</h6>
        </div>
        <div class="col-md-3">
            <button type="button" @click="croppieSaveEventHandler()" class="btn btn-filter btn-small pull-right">Guardar</button>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-2 offset-5" x-init="initialize()">
            <div id="customer-avatar-upload" class="text-center">
                <h5 x-show="!croppie.visible">Largue aqui a sua foto ou clique na area</h5>
                <input type="file" id="customer-avatar-upload-input" name="avatar" accept="image/*" x-ref="input" @change="croppieUpdateEventHandler()" @dragover="$el.classList.add('active')" @dragleave="$el.classList.remove('active')" @drop="$el.classList.remove('active')" />
                <div x-show="croppie.visible" id="customer-avatar-croppie">
                    <img alt x-ref="croppie" />
                </div>
                <div id="customer-avatar-current" x-show="!croppie.visible" @click="setAvatarClickEventHandler()">
                    <img x-ref="result" src="{{ $avatar->image }}" width="220" height="220" />
                    <div id="customer-avatar-current-edit">
                        <h6 class="text-white">
                            <i class="ri ri-camera-2-line ri-2x"></i><br />
                            <p class="mt-3">Alterar foto</p>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <input form="customer-save" name="avatar" type="hidden" id="avatar" />
    </div>
</div>

