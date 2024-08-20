@extends('layouts.v_main')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <h3>Nilai</h3>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-sm table-striped table-bordered datatables-1">
                <thead>
                  <tr>
                    <th style="text-align: center;">NO</th>
                    <th>MATA KULIAH</th>
                    <th>DOSEN PENGAMPU</th>
                    <th>KELAS</th>
                    <th style="text-align: center;">NILAI</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $key => $row)
                    <tr>
                      <td align="center">{{ $loop->iteration }}.</td>
                      <td>{{ $row->kelas->mata_kuliah->mata_kuliah }}</td>
                      <td>{{ $row->kelas->dosen->nama }}</td>
                      <td>{{ $row->kelas->kelas }}</td>
                      <td align="center">{{ $row->nilai }}</td>
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