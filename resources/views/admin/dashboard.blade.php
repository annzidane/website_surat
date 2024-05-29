@extends('admin.layouts.app')

@section('title',)

@section('contents')
  <style>
    /* CSS untuk membuat semua kotak memiliki ukuran yang sama */
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }
    .card {
      width: 100%;
      height: 100%;
    }
  </style>

  <div class="container mt-4">
    <div class="card shadow-sm">
      <div class="card-body">
        <h1>Dashboard</h1>
        <div class="row card-container mt-3">
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
                    <div>Total Surat Keterangan Kematian</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3">
                    <i class="fas fa-envelope fa-2x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <div class="h5 mb-0 font-weight-bold">{{ $usahaCount }}</div>
                    <div>Total Surat Keterangan Usaha</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger text-white shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3">
                    <i class="fas fa-home fa-2x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <div class="h5 mb-0 font-weight-bold">{{ $domisiliCount }}</div>
                    <div>Total Surat Keterangan Domisili</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tambahkan kotak untuk Surat Keterangan Kelahiran -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-info text-white shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3">
                    <i class="fas fa-baby fa-2x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <div class="h5 mb-0 font-weight-bold">{{ $kelahiranCount }}</div>
                    <div>Total Surat Keterangan Kelahiran</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tambahkan kotak untuk Surat Keterangan Pindah Datang -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-secondary text-white shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3">
                    <i class="fas fa-truck-moving fa-2x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <div class="h5 mb-0 font-weight-bold">{{ $pindahCount }}</div>
                    <div>Total Surat Keterangan Pindah Datang</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tambahkan kotak untuk Surat Keterangan Tidak Mampu (SKTM) -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-dark text-white shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3">
                    <i class="fas fa-hand-holding-usd fa-2x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <div class="h5 mb-0 font-weight-bold">{{ $sktmCount }}</div>
                    <div>Total Surat Keterangan Tidak Mampu (SKTM)</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Add more cards here as needed -->
        </div>
      </div>
    </div>
  </div>
@endsection
