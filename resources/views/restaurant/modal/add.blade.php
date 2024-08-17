<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Add Item</h4>
        </div>
        <form action="/product" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="name" placeholder="Input in here ...">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kategori</label>
                  <select class="form-control" name="category">
                    <option>Pilih Kategori</option>
                    <option value="food">Makanan</option>
                    <option value="drink">Minuman</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="image" placeholder="Input in here ..." accept="image/*" required>
                  </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name="price" placeholder="Input in here ..." required>
                  </div>
                  <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="description" required rows="3"></textarea>
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
