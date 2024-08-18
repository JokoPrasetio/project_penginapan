<div class="modal fade" id="modal_report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Laporan Penjualan</h4>
        </div>
        <form action="/report-download" method="POST">
        @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="start_date" required>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Berakhir</label>
                    <input type="date" class="form-control" name="end_date" required>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Download</button>
            </div>
        </form>
      </div>
    </div>
  </div>
