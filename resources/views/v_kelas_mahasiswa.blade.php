@extends('layouts.v_main')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h3>Mahasiswa Kelas</h3>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-striped">
                <tr>
                  <td style="width: 200px;">Mata Kuliah</td>
                  <td style="width: 10px">:</td>
                  <td>{{ $kelas->mata_kuliah->mata_kuliah.' - ('.$kelas->mata_kuliah->kode.')' }}</td>
                </tr>
                <tr>
                  <td>Dosen Pengampu</td>
                  <td>:</td>
                  <td>{{ $kelas->dosen->nama.' - ('.$kelas->dosen->username.')' }}</td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td>:</td>
                  <td>{{ $kelas->kelas }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <a class="btn btn-primary" onclick="load_modal('/kelas-mahasiswa/tambah/{{ $kelas_id }}')" href="#!"><i class="fas fa-plus"></i> Tambah</a>
            <hr>
            <div class="table-responsive">
              <table class="table table-sm table-striped table-bordered datatables-1">
                <thead>
                  <tr>
                    <th style="text-align: center;">NO</th>
                    <th>NIM</th>
                    <th>NAMA MAHASISWA</th>
                    <th style="text-align: center;">NILAI</th>
                    @if (getAuth('role') == 'admin')
                      <th style="text-align: center;">AKSI</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $row)
                    <tr>
                      <td align="center">{{ $loop->iteration }}.</td>
                      <td>{{ $row->mahasiswa_id }}</td>
                      <td>{{ $row->mahasiswa_id }}</td>
                      <td align="center">
                        <input type="number" min="0" max="100" maxlength="3" class="form-control form-control-sm" value="{{ $row->nilai }}" placeholder="..." style="min-width: 100px;">
                      </td>
                      @if (getAuth('role') == 'admin')
                        <td align="center">
                          <a href="/kelas-mahasiswa/hapus/{{ $row->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus mahasiswa kelas ini?')">
                            <button type="button" class="btn btn-sm mt-1 mr-1 btn-danger"><i class="fas fa-trash"></i></button>
                          </a>
                        </td>
                      @endif
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