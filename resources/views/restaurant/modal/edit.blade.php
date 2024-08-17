<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
        </div>
        <form method="POST" enctype="multipart/form-data" id="form_edit">
            @method('put')
        @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="name" id="edit_name" placeholder="Input in here ...">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kategori</label>
                  <select class="form-control" name="category" id="edit_category">
                    <option>Pilih Kategori</option>
                    <option value="food">Makanan</option>
                    <option value="drink">Minuman</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="image" placeholder="Input in here ..." accept="image/*">
                    <p class="help-block" style="font-size: 1rem">* Jika tidak upload gambar, maka gambar tidak akan ada perubahan</p>
                  </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="price" id="edit_price" placeholder="Input in here ..." required>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="description" id="edit_description" required rows="3"></textarea>
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
