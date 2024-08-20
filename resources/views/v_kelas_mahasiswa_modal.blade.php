@if ($modal == 'tambah')
  <div class="modal-header">
    <h4 class="modal-title"><b>Tambah</b> | Mahasiswa Kelas</h4>
    <button type="button" class="close btn-default btn-sm" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" class="fas fa-times"></span>
    </button>
  </div>
  <form action="/kelas-mahasiswa/tambah" method="POST" class="form-inputdata" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="kelas_id" value="{{ $kelas_id }}">
    <div class="modal-body">
      <div class="card">	
        <div class="card-body">
          <div class="form-group">
            <label>NIM <b class="text-danger">*</b></label>
            <input type="text" name="nim" class="form-control" placeholder="..." required>
          </div>
        </div>
        <div class="modal-footer justify-content-between bg-gray-pudar">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
          <button type="submit" class="btn btn-primary text-white"><i class="fas fa-check"></i> Simpan</button>
        </div>
      </div>
    </div>
  </form>
@endif