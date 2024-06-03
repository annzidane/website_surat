@extends('admin.layouts.app')

@section('title', 'Dashboard')

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
    <!-- Container untuk Cards -->
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h1>Dashboard</h1>
        <div class="row card-container mt-3">
          <!-- Tombol Cetak Rekap -->
          <div class="col-12 text-right mb-4">
            <a href="{{ route('rekap.download') }}" class="btn btn-info">Cetak Rekap</a>
          </div>
          
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

          <!-- Kotak untuk Surat Keterangan Kelahiran -->
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

          <!-- Kotak untuk Surat Keterangan Pindah Datang -->
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

          <!-- Kotak untuk Surat Keterangan Tidak Mampu (SKTM) -->
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

          <!-- Kotak untuk Surat Pengantar Nikah -->
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-light text-dark shadow">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-3">
                    <i class="fas fa-heart fa-2x"></i>
                  </div>
                  <div class="col-9 text-right">
                    <div class="h5 mb-0 font-weight-bold">{{ $nikahCount }}</div>
                    <div>Total Surat Pengantar Nikah</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Add more cards here as needed -->
        </div>
      </div>
    </div>

    <!-- Container untuk Chart -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h2>Grafik Pengajuan Surat Per Bulan</h2>
        <canvas id="suratChart"></canvas>
      </div>
    </div>
  </div>
  
  <canvas id="suratChart"></canvas>
  <!-- Include Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const ctx = document.getElementById('suratChart').getContext('2d');
      const suratData = @json($suratData);

      const chart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: Object.keys(suratData),
          datasets: [{
            label: 'Total Surat Per Bulan',
            data: Object.values(suratData),
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  </script>
@endsection
