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
                <div class="center">
                  <div class="form-input">
                    <label for="file-ip-1">Upload Gambar</label>
                    <input type="file" id="file-ip-1" name="gambar" accept="image/*" onchange="showPreview(event);">
                    <div class="preview">
                      <img id="file-ip-1-preview">
                    </div>
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
<script>
  function showPreview(event){
      if(event.target.files.length > 0){
          var src = URL.createObjectURL(event.target.files[0]);
          var preview = document.getElementById("file-ip-1-preview");
          preview.src = src;
          preview.style.display = "block";
      }
  }
</script>