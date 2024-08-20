@extends('layouts.v_main')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h3>{{ ucwords($role) }}</h3>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <a class="btn btn-primary" onclick="load_modal('/user/tambah/{{ $role }}')" href="#!"><i class="fas fa-plus"></i> Tambah</a>
            <hr>
            <div class="table-responsive">
              <table class="table table-sm table-striped table-bordered datatables-1">
                <thead>
                  <tr>
                    <th style="text-align: center;">NO</th>
                    <th>NAMA</th>
                    <th>USERNAME</th>
                    @if ($role == 'admin')
                      <th style="text-align: center;">AKSI</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $row)
                    <tr>
                      <td align="center">{{ $loop->iteration }}.</td>
                      <td>{{ $row->nama }}</td>
                      <td>{{ $row->username }}</td>
                      @if ($role == 'admin')
                        <td align="center">
                          <button type="button" onclick="load_modal('/user/edit/{{ $row->id }}')" class="btn btn-sm mt-1 mr-1 btn-primary"><i class="fas fa-edit"></i> Edit</button>
                          <a href="/user/reset-password/{{ $row->id }}" onclick="return confirm('Apakah anda yakin ingin mereset password dari: {{ $row->nama }}?')">
                            <button type="button" class="btn btn-sm mt-1 mr-1 btn-warning"><i class="fas fa-sync"></i> Reset Password</button>
                          </a>
                          <a href="/user/hapus/{{ $row->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus data: {{ $row->nama }}?')">
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