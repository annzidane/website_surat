@extends('admin.layouts.app')

@section('title', 'Dashboard - Laravel Admin Panel With Login and Registration')

@section('contents')
  <div class="container mt-4">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card bg-primary text-white shadow">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-3">
                <i class="fas fa-users fa-2x"></i>
              </div>
              <div class="col-9 text-right">
                <div class="h5 mb-0 font-weight-bold">{{ $userCount }}</div>
                <div>Total Users</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card bg-success text-white shadow">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-3">
                <i class="fas fa-file-alt fa-2x"></i>
              </div>
              <div class="col-9 text-right">
                <div class="h5 mb-0 font-weight-bold">{{ $kematianCount }}</div>
                <div>Total Kematian</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Add more cards here as needed -->
    </div>
  </div>
@endsection
