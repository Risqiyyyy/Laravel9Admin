@extends('layouts/contentNavbarLayout')

@section('title', 'Siswa')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
   {{-- modal --}}
   <div class="d-grid gap-2 d-md-block">
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah Siswa</button>
  </div>  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('siswa.store') }} ">
            @csrf
            <div class="mb-3">
              <div class="row">
                <div class="col">
                  <label class="col-form-label">NIS</label>
                  <input type="text" class="form-control" placeholder="Msukan NIS" name="NIS" required>
                </div>
                <div class="col">
                  <label class="col-form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" placeholder="Masukan Nama Lengkap"  name="Nama_Lengkap" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col">
                  <label class="col-form-label">Tempat Lahir</label>
                  <input type="text" class="form-control" placeholder="Msukan Tempat Lahir" name="Tempat_Lahir" required>
                </div>
                <div class="col">
                  <label class="col-form-label">Tanggal Lahir</label>
                  <input type="Date" class="form-control" placeholder="Masukan Tanggal Lahir"  name="Tanggal_Lahir" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col">
                  <label class="col-form-label">Agama</label>
                  <input type="text" class="form-control" placeholder="Msukan Agama" name="Agama" required>
                </div>
                <div class="col">
                  <label class="col-form-label">Jenis Kelamin</label>
                  <input type="text" class="form-control" placeholder="Masukan Jenis Kelamin"  name="Jenis_Kelamin" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col">
                  <label class="col-form-label">Alamat</label>
                  <input type="text" class="form-control" placeholder="Msukan Alamat" name="Alamat" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
{{-- end modal --}}
    <div class="card">
        <h5 class="card-header">Tabel Siswa</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($siswa as $s)
              <tr>
                <td>{{ $s->NIS }}</td>
                <td>{{ $s->Nama_Lengkap }}</td>
                <td>{{ $s->Tempat_Lahir }}</td>
                <td>{{ $s->Tanggal_Lahir }}</td>
                <td>{{ $s->Agama }}</td>
                <td>{{ $s->Jenis_Kelamin }}</td>
                <td>{{ $s->Alamat }}</td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('siswa.detail', $s->NIS) }}"><i class="bx bx-edit-alt me-1"></i> Detail</a>
                      <a class="dropdown-item" href="{{ route('siswa.delete', $s->NIS) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>
<script>
  var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})
</script>
@endsection
