<div class="modal fade" id="modal-success">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <form id="formProduk" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="process" id="process">
                    <input type="hidden" name="produk_id" id="produk_id">
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="nama" class="control-label">Nama Produk</label>
                            <input type="text" name="nama" id="nama" class="form-control" autofocus>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="id_kategori" class="control-label">Kategori Produk</label>
                            <select name="id_kategori" id="selectCategory" class="form-control">
                                <!-- GET Option form api/get-kategori -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="gambar" class="control-label">Gambar Produk</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                            <br>
                            <div id="preview"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="warna" class="control-label">Warna Produk</label>
                                <input type="text" name="warna" id="warna" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="warna" class="control-label">Berat Produk</label>
                                <input type="text" name="berat" id="berat" placeholder="gr" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="warna" class="control-label">Harga Produk</label>
                                <input type="text" name="harga" id="harga" placeholder="Rp" class="form-control rupiah">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            <label for="deskripsi" class="control-label">Deskripsi Produk</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                                class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-success" id="btnSave">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
