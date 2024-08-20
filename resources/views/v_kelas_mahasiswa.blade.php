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
                      <td>{{ $row->mahasiswa->username }}</td>
                      <td>{{ $row->mahasiswa->nama }}</td>
                      <td align="center">
                        <table>
                          <tr style="background-color: transparent;">
                            <td style="border: 0px;">
                              <input type="number" min="0" max="100" maxlength="3" onchange="edit_nilai('{{ $row->id }}', this.value)" class="form-control form-control-sm input-disabled" value="{{ $row->nilai }}" placeholder="..." style="width: 100px;">
                            </td>
                            <td style="border: 0px;">
                              <div id="alert-{{ $row->id }}"></div>
                            </td>
                          </tr>
                        </table>
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
<script>
  function edit_nilai(id, nilai) 
  {
    $('#input-disabled').prop('disabled', true);
    $('#alert-'+id).html('<i class="fas fa-spinner fa-pulse"></i>');

		$.ajax({
			url: '{{ url("kelas-mahasiswa/edit-nilai") }}/'+id+'/'+nilai,
			type: 'get',
			success: function(data) {
				if(data == 'success'){
          $('#alert-'+id).html('<i class="fas fa-check-circle text-success"></i>');
          $('#alert-'+id).show();
        }
        else{
          alert(data);
        }

        $('#input-disabled').prop('disabled', false);
        $('#alert-'+id).delay(2000).hide(500);
			}
		});
	}
</script>
@endsection