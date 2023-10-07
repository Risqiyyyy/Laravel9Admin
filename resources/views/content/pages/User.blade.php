@extends('layouts/contentNavbarLayout')

@section('title', 'User')

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
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah User</button>
  </div>  
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('user.store') }} ">
            @csrf
            <div class="mb-3">
              <div class="row">
                <div class="col">
                  <label class="col-form-label">Email</label>
                  <input type="email" class="form-control" placeholder="Email" aria-label="Masukan Email" name="email" required>
                </div>
                <div class="col">
                  <label class="col-form-label">Password</label>
                  <input type="password" class="form-control" placeholder="Password" aria-label="Masukan Password" name="password" required>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <div class="row">
                <div class="col">
                  <label class="col-form-label">Role</label>
                  <input type="text" class="form-control" placeholder="Role" aria-label="Role" name="role" required>
                </div>
                <div class="col">
                  {{-- <label class="col-form-label">NIS</label>
                  <input type="text" class="form-control" placeholder="NIS" aria-label="Masukan NIS"> --}}
                  {{-- <label class="col-form-label">NIP</label>
                  <input type="text" class="form-control" placeholder="NIP" aria-label="Masukan NIP"> --}}
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
        <h5 class="card-header">Tabel User</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Uuid</th>
                <th>Email</th>
                <th>Role</th>
                <th>NIS/NIP</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($users as $u)
              <tr>
                <td>{{ $u->uuid }}</td>
                <td>{{ $u->email }}</td>
                <td> {{ $u->role }}</td>
                <td><span class="badge bg-label-primary me-1">Active</span></td>
                <td>
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
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
