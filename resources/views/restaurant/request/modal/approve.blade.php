<div class="modal fade" id="modal_approved" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi Pesanan</h4>
        </div>
        <form action="/product" method="POST" id="form_confirm_approved">
        @csrf
        @method('put')
            <div class="modal-body">
              Apakah yakin ingin konfirmasi pesanan ini, <strong  id="confirm_approve"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Konfirmasi</button>
            </div>
        </form>
      </div>
    </div>
  </div>
