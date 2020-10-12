<div class="modal fade" id="modal-success">
    <div class="modal-dialog">
      <div class="modal-content bg-default">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form id="formCategory">
            @csrf
            <div class="modal-body">
                <input type="hidden" name="process" id="process">
                <input type="hidden" name="kategori_id" id="kategori_id">
                <div class="form-group">
                    <label for="nama" class="control-label">Nama Kategori</label>
                    <input type="text" name="nama" id="nama" class="form-control" autofocus>
                </div>
                <div class="form-group">
                  <div class="custom-file-container" data-upload-id="myUpload">
                    <label>Upload Icon <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                    <label class="custom-file-container__custom-file">
                        <input type="file" class="custom-file-container__custom-file__custom-file-input" id="customFile" accept="image/*" aria-label="Choose File">
                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                    </label>
                    <div class="custom-file-container__image-preview"></div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-success" id="btnSave"><i class="fa fa-check"></i> &nbsp;Simpan</button>
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>