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
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .signature {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="title">SURAT KETERANGAN KEMATIAN</div>
    <table>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $data->nama }}</td>
        </tr>
        <tr>
            <th>Bin/Binti</th>
            <td>{{ $data->bin_binti }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $data->nik }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $data->jenis_kelamin }}</td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td>{{ $data->tempat_lahir }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $data->tanggal_lahir }}</td>
        </tr>
        <tr>
            <th>Status Perkawinan</th>
            <td>{{ $data->status_pernikahan }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $data->pekerjaan }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $data->alamat }}</td>
        </tr>
        <tr>
            <th>Telah Meninggal Dunia Pada:</th>
            <td></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>{{ $data->tanggal_meninggal }}</td>
        </tr>
        <tr>
            <td>Jam</td>
            <td>{{ $data->jam_meninggal }}</td>
        </tr>
        <tr>
            <th>Bertempat di</th>
            <td>{{ $data->tempat_meninggal }}</td>
        </tr>
        <tr>
            <th>Penyebab Kematian</th>
            <td>{{ $data->sebab_meninggal }}</td>
        </tr>
    </table>

    <div>
        Surat Keterangan Ini Dibuat Berdasarkan Keterangan Pelapor:
    </div>

    <table>
        <tr>
            <th>Nama Lengkap</th>
            <td>{{ $data->nama_pelapor }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $data->nik_pelapor }}</td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td>{{ $data->tanggal_lahir_pelapor }}</td>
        </tr>
        <tr>
            <th>Pekerjaan</th>
            <td>{{ $data->pekerjaan_pelapor }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $data->alamat_pelapor }}</td>
        </tr>
        <tr>
            <th>Hubungan Pelapor</th>
            <td>{{ $data->hubungan_pelapor }}</td>
        </tr>
    </table>

    <div class="signature">
        <div>Sambeng, {{ $data->updated_at }}</div>
        <div>Kepala Desa Sambeng</div>
        <div>Slamet Khasani</div>
    </div>
</body>
</html>
