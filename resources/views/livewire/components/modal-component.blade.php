<div>
    <section class="app-modal" id="confirmation-modal">
        <div class="app-modal-dialog">
            <div class="app-modal-content">
                <div class="app-modal-header">
                    <div class="row">
                        <div class="col-10">{{ $title }}</div>
                        <div class="col-2">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <div class="app-modal-body">
                    {!! $message !!}
                </div>
                <div class="app-modal-footer text-right">
                    @switch($actions)
                        @case("cancelanddelete")
                            <button type="button" class="btn btn-filter" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger">
                                <i class="ri ri-delete-bin-2-line"></i>
                                Sim, apagar!</button>
                        @break
                    @endswitch
                </div>
            </div>
        </div>
    </section>
</div>
