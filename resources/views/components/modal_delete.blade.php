<!-- Normal Modal -->
<div class="modal "
     id="modal-delete"
     tabindex="-1"
     role="dialog"
     aria-labelledby="{{ $id ?? 'modal-delete' }}"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title" id="{{ $id ?? 'modal-delete' }}">Konfirmasi Hapus</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="modal-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Batal</button>
                <button type="submit"
                        form="{{ $form }}"
                        formaction="{{ $action }}"
                        class="btn btn-alt-danger" >
                        <i class="fa fa-times"></i> Hapus
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END Normal Modal -->
