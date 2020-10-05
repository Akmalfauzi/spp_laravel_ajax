<div class="modal fade" role="dialog" id="modalShow">
    <div class="modal-dialog {{ $modalSize }}" role="document">
        <form id="{{ $idForm }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ $form }}
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button id="btnClose" type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                    <button id="btnSubmit" type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Save changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


