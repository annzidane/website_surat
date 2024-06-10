<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kematian</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
            text-align: left;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .nomor {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        th, td {
            text-align: left;
            padding: 5px;
        }

        .signature {
            margin-top: 10px;
            text-align: right;
        }

        .signature div {
            margin-bottom: 10px;
        }

        .right-align {
            text-align: right;
        }
    </style>
</head>
<body>
    @php
        use Carbon\Carbon;
    @endphp
    <div class="container">
        <div class="title">SURAT KETERANGAN KEMATIAN</div>
        <div class="nomor">NOMOR: {{ $data->nomor_surat }}</div>

        <div class="section">
            <div class="section-title">Data Almarhum/Almarhumah:</div>
            <table>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>: {{ $data->nama }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>: {{ $data->nik }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>: {{ $data->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <td>: {{ $data->tempat_lahir }}, {{ Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Umur</th>
                    <td>: {{ $data->umur }}</td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td>: {{ $data->agama }}</td>
                </tr>
                <tr>
                    <th>Status Perkawinan</th>
                    <td>: {{ $data->status_pernikahan }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>: {{ $data->alamat }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Telah Meninggal Dunia Pada:</div>
            <table>
                <tr>
                    <th>Tanggal</th>
                    <td>: {{ Carbon::parse($data->tanggal_meninggal)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Bertempat di</th>
                    <td>: {{ $data->tempat_meninggal }}</td>
                </tr>
                <tr>
                    <th>Penyebab Kematian</th>
                    <td>: {{ $data->sebab_meninggal }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div class="section-title">Surat Keterangan Ini Dibuat Berdasarkan Keterangan Pelapor:</div>
            <table>
                <tr>
                    <th>Nama Lengkap</th>
                    <td>: {{ $data->nama_pelapor }}</td>
                </tr>
                <tr>
                    <th>NIK</th>
                    <td>: {{ $data->nik_pelapor }}</td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td>: {{ Carbon::parse($data->tanggal_lahir_pelapor)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>: {{ $data->pekerjaan_pelapor }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>: {{ $data->alamat_pelapor }}</td>
                </tr>
                <tr>
                    <th>Hubungan Pelapor</th>
                    <td>: {{ $data->hubungan_pelapor }}</td>
                </tr>
            </table>
        </div>

        <div class="signature">
            <div>Sambeng, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
            <div>Kepala Desa Sambeng</div>
            <div style="margin-top: 50px;">Slamet Khasani</div>
        </div>
    </div>
</body>
</html>
