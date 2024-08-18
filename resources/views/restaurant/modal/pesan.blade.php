<div class="modal fade" id="pesanModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Pesanan</h4>
            </div>
            <form action="/transaction/restaurant" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="container">
                    <div class="row">
                            <div class="col-md-12" id="itemBasket">
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <p style="font-weight: 400; font-size:15px;">Total Harga:
                                    <span style="font-weight: 600; font-size:18px;" id="totalPrice">0</span>
                                </div>
                                <div class="alert alert-info alert-dismissible" role="alert" style="font-size: 15px; margin-bottom:12px;">
                                    <strong>Wajib! Isi Data Dibawah</strong>
                                  </div>
                                <div class="form-group">
                                    <label for="edit_name">Nama Pemesan</label>
                                    <input type="text" class="form-control" name="name" id="edit_name" placeholder="Input in here ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="room_name">Nama Ruangan</label>
                                    <input type="text" class="form-control" name="name_room" id="room_name" placeholder="Input in here ..." required>
                                </div>
                                <div class="form-group">
                                    <label for="whatsapp_number">No Whatsapp</label>
                                    <input type="number" class="form-control" name="no_wa" id="whatsapp_number" placeholder="Input in here ..." required>
                                    <input type="hidden" name="selected_items" id="selectedItemsInput">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="submitForm()">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>
