<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Domisili</title>
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

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .header .details {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }

        .title {
            text-align: left;
            font-size: 16px;
            margin-bottom: 20px;
            text-decoration: underline;
        }

        .nomor {
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
            text-decoration: underline;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 5px;
        }

        .signature {
            margin-top: 50px;
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
    <div class="container">
        <div class="header">
            <img src="asset/pemalang.jpg"  alt="logo" srcset="" style="width: 10%; margin-bottom: 10px;">
            <div class="details">
                PEMERINTAH KABUPATEN PEMALANG<br>
                KECAMATAN BANTARBOLANG<br>
                DESA SAMBENG
            </div>
        </div>
        <div class="title" >SURAT KETERANGAN DOMISILI</div>
        <div class="nomor">NOMOR: {{ $data->nomor_surat }}</div>

        <div class="section">
            <div>Yang bertanda tangan dibawah ini Kepala Desa Sambeng, Kecamatan Bantarbolang, Kabupaten Pemalang menerangkan bahwa:</div>
            <table>
                <tr>
                    <th>Nama</th>
                    <td>: {{ $data->nama }}</td>
                </tr>
                <tr>
                    <th>Tempat/Tgl. Lahir</th>
                    <td>: {{ $data->tempat_lahir }}, {{ \Carbon\Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
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
                    <th>Kewarganegaraan</th>
                    <td>: {{ $data->kewarganegaraan }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>: {{ $data->status_pernikahan }}</td>
                </tr>
                <tr>
                    <th>Alamat KTP</th>
                    <td>: {{ $data->alamat_ktp }}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>: {{ $data->keterangan_domisili }}</td>
                </tr>
            </table>
        </div>

        <div class="section">
            <div>Demikian Surat Keterangan Domisili ini dibuat, atas periksa dan perhatiannya kami ucapkan terima kasih.</div>
        </div>

        <div class="signature">
            <div>Sambeng, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
            <div>Kepala Desa Sambeng</div>
            <div style="margin-top: 50px;">Slamet Khasani</div>
        </div>
    </div>
</body>
</html>
