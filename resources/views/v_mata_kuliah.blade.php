@extends('layouts.v_main')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h3>Mata Kuliah</h3>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <a class="btn btn-primary" onclick="load_modal('/mata-kuliah/tambah/{{ $role }}')" href="#!"><i class="fas fa-plus"></i> Tambah</a>
            <hr>
            <div class="table-responsive">
              <table class="table table-sm table-striped table-bordered datatables-1">
                <thead>
                  <tr>
                    <th style="text-align: center;">NO</th>
                    <th>KODE</th>
                    <th>MATA KULIAH</th>
                    @if (getAuth('role') == 'admin')
                      <th style="text-align: center;">AKSI</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $row)
                    <tr>
                      <td align="center">{{ $loop->iteration }}.</td>
                      <td>{{ $row->kode }}</td>
                      <td>{{ $row->mata_kuliah }}</td>
                      @if (getAuth('role') == 'admin')
                        <td align="center">
                          <button type="button" onclick="load_modal('/mata-kuliah/edit/{{ $row->id.'/'.$role }}')" class="btn btn-sm mt-1 mr-1 btn-primary"><i class="fas fa-edit"></i> Edit</button>
                          <a href="/mata-kuliah/hapus/{{ $row->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data: {{ $row->nama }}?')">
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