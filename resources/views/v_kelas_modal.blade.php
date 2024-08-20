@if ($modal == 'tambah')
  <div class="modal-header">
    <h4 class="modal-title"><b>Tambah</b> | Kelas Mata Kuliah</h4>
    <button type="button" class="close btn-default btn-sm" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" class="fas fa-times"></span>
    </button>
  </div>
  <form action="/kelas/tambah" method="POST" class="form-inputdata" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
      <div class="card">	
        <div class="card-body">
          <div class="form-group">
            <label>Mata Kuliah <b class="text-danger">*</b></label>
            <select name="mata_kuliah_id" class="form-control" placeholder="..." required>
              <option value="" hidden>- Pilih -</option>
              @foreach ($mata_kuliah as $key_mata_kuliah => $row_mata_kuliah)
                <option value="{{ $row_mata_kuliah->id }}">{{ $row_mata_kuliah->kode.' - '.$row_mata_kuliah->mata_kuliah }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Dosen <b class="text-danger">*</b></label>
            <select name="dosen_id" class="form-control" placeholder="..." required>
              <option value="" hidden>- Pilih -</option>
              @foreach ($dosen as $key_dosen => $row_dosen)
                <option value="{{ $row_dosen->id }}">{{ $row_dosen->username.' - '.$row_dosen->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Kelas <b class="text-danger">*</b></label>
            <input type="text" name="kelas" class="form-control" placeholder="..." required>
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
    <h4 class="modal-title"><b>Edit</b> | Kelas Mata Kuliah</h4>
    <button type="button" class="close btn-default btn-sm" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" class="fas fa-times"></span>
    </button>
  </div>
  <form action="/kelas/edit" method="POST" class="form-inputdata" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $row->id }}">
    <div class="modal-body">
      <div class="card m-b-0">
        <div class="card-body">
          <div class="form-group">
            <label>Mata Kuliah <b class="text-danger">*</b></label>
            <select name="mata_kuliah_id" class="form-control" placeholder="..." required>
              <option value="" hidden>- Pilih -</option>
              @foreach ($mata_kuliah as $key_mata_kuliah => $row_mata_kuliah)
                <option value="{{ $row_mata_kuliah->id }}" {{ $row_mata_kuliah->id == $row->mata_kuliah_id ? 'selected' : '' }}>{{ $row_mata_kuliah->kode.' - '.$row_mata_kuliah->mata_kuliah }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Dosen <b class="text-danger">*</b></label>
            <select name="dosen_id" class="form-control" placeholder="..." required>
              <option value="" hidden>- Pilih -</option>
              @foreach ($dosen as $key_dosen => $row_dosen)
                <option value="{{ $row_dosen->id }}" {{ $row_dosen->id == $row->dosen_id ? 'selected' : '' }}>{{ $row_dosen->username.' - '.$row_dosen->nama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Kelas <b class="text-danger">*</b></label>
            <input type="text" name="kelas" class="form-control" placeholder="..." value="{{ $row->kelas }}" required>
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