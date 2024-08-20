@if ($modal == 'tambah')
  <div class="modal-header">
    <h4 class="modal-title"><b>Tambah</b> | Mata Kuliah</h4>
    <button type="button" class="close btn-default btn-sm" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" class="fas fa-times"></span>
    </button>
  </div>
  <form action="/mata-kuliah/tambah/{{ $role }}" method="POST" class="form-inputdata" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
      <div class="card">	
        <div class="card-body">
          <div class="form-group">
            <label>Kode <b class="text-danger">*</b></label>
            <input type="text" name="kode" class="form-control" placeholder="..." required>
          </div>
          <div class="form-group">
            <label>Mata Kuliah <b class="text-danger">*</b></label>
            <input type="text" name="mata_kuliah" class="form-control" placeholder="..." required>
          </div>
        </div>
        <div class="modal-footer justify-content-between bg-gray-pudar">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
          <button type="submit" class="btn btn-primary text-white"><i class="fas fa-check"></i> Simpan</button>
        </div>
      </div>
    </div>
  </form>









@elseif ($modal == 'edit')
  <div class="modal-header">
    <h4 class="modal-title"><b>Edit</b> | Mata Kuliah</h4>
    <button type="button" class="close btn-default btn-sm" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" class="fas fa-times"></span>
    </button>
  </div>
  <form action="/mata-kuliah/edit" method="POST" class="form-inputdata" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $row->id }}">
    <div class="modal-body">
      <div class="card m-b-0">
        <div class="card-body">
          <div class="form-group">
            <label>Kode <b class="text-danger">*</b></label>
            <input type="text" name="kode" class="form-control" placeholder="..." value="{{ $row->kode }}" required>
          </div>
          <div class="form-group">
            <label>Mata Kuliah <b class="text-danger">*</b></label>
            <input type="text" name="mata_kuliah" class="form-control" placeholder="..." value="{{ $row->mata_kuliah }}" required>
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