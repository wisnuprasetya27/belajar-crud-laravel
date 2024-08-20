@extends('layouts.v_main')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h3>Kelas</h3>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <a class="btn btn-primary" onclick="load_modal('/kelas/tambah')" href="#!"><i class="fas fa-plus"></i> Tambah</a>
            <hr>
            <div class="table-responsive">
              <table class="table table-sm table-striped table-bordered datatables-1">
                <thead>
                  <tr>
                    <th style="text-align: center;">NO</th>
                    <th>KODE</th>
                    <th>MATA KULIAH</th>
                    <th>DOSEN PENGAMPU</th>
                    <th style="text-align: center;">AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $row)
                    <tr>
                      <td align="center">{{ $loop->iteration }}.</td>
                      <td>{{ $row->mata_kuliah_id }}</td>
                      <td>{{ $row->dosen_id }}</td>
                      <td align="center">
                        <a href="/kelas/mahasiswa/{{ $row->id }}">
                          <button type="button" class="btn btn-sm mt-1 mr-1 btn-info"><i class="users"></i> Mahasiswa Kelas</button>
                        </a>
                        @if (getAuth('role') == 'admin')
                          <button type="button" onclick="load_modal('/kelas/edit/{{ $row->id }}')" class="btn btn-sm mt-1 mr-1 btn-primary"><i class="fas fa-edit"></i> Edit</button>
                          <a href="/kelas/hapus/{{ $row->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data: {{ $row->nama }}?')">
                            <button type="button" class="btn btn-sm mt-1 mr-1 btn-danger"><i class="fas fa-trash"></i></button>
                          </a>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection