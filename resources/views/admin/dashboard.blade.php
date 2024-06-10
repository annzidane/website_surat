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

    /* Tambahan CSS untuk tombol Cetak Rekap */
    .btn-cetak-rekap {
      display: inline-flex;
      align-items: center;
      background-color: #17a2b8;
      color: white;
      font-weight: bold;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn-cetak-rekap:hover {
      background-color: #138496;
      text-decoration: none;
    }

    .btn-cetak-rekap i {
      margin-right: 10px;
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
            <a href="{{ route('rekap.download') }}" class="btn-cetak-rekap">
              <i class="fas fa-print"></i> Cetak Rekap
            </a>
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

        </div>
      </div>
    </div>

    <!-- Container for the Chart -->
    <div class="card shadow-sm">
      <div class="card-body">
        <h2>Grafik Pengajuan Surat Per Bulan</h2>
        <!-- Chart for document submissions -->
        <div id="suratChart" style="height: 350px;"></div>
      </div>
    </div>
  </div>

  <!-- Include ApexCharts -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Data dari server
      const suratData = @json($suratData);

      // Buat array untuk labels dan data
      const labels = Object.keys(suratData);
      const data = Object.values(suratData);

      // Buat chart
      const chart = new ApexCharts(document.querySelector("#suratChart"), {
        series: [{
          name: 'Total Surat Per Bulan',
          data: data,
        }],
        chart: {
          height: 350,
          type: 'area',
          toolbar: {
            show: false
          },
        },
        markers: {
          size: 4
        },
        colors: ['#4154f1'],
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.3,
            opacityTo: 0.4,
            stops: [0, 90, 100]
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',
          width: 2
        },
        xaxis: {
          categories: labels,
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        }
      });

      // Render chart
      chart.render();
    });
  </script>
@endsection
