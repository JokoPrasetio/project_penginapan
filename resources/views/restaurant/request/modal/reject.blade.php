<div class="modal fade" id="modal_reject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Konfirmasi Pesanan</h4>
        </div>
        <form action="/product" method="POST" id="form_reject_approved">
        @csrf
        @method('put')
            <div class="modal-body">
              Apakah yakin ingin menolak pesanan ini, <strong  id="confirm_reject"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Konfirmasi</button>
            </div>
        </form>
      </div>
    </div>
  </div>
