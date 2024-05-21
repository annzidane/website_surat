<!DOCTYPE html>
<html>
<head>
    <title>Surat Keterangan Kematian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin: 0 auto;
            width: 80%;
        }
        .list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .list-item {
            margin-bottom: 10px;
        }
        .list-item strong {
            font-weight: bold;
        }
        .footer {
            position: absolute;
            bottom: 0;
            right: 0;
            margin-bottom: 20px;
            margin-right: 20px;
        }
        #camat{
            text-align:center;
        }
        #nama-camat{
            margin-top:100px;
            text-align:center;
        }
        .row{
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SURAT KETERANGAN KEMATIAN</h1>
        <p>Nomor : ..................</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini Kepala Desa .................. Kecamatan .................. .................. menerangkan dengan sebenarnya, bahwa :</p>
        <ul class="list">
            <li class="list-item"><strong>Nama:</strong> {{ $data->nama }}</li>
            <li class="list-item"><strong>Bin / Binti:</strong> {{ $data->bin_binti }}</li>
            <li class="list-item"><strong>NIK:</strong> {{ $data->nik }}</li>
            <li class="list-item"><strong>Jenis Kelamin:</strong> {{ $data->jenis_kelamin }}</li>
            <li class="list-item"><strong>Tempat/Tanggal Lahir:</strong> {{ $data->tempat_lahir }} / {{ $data->tanggal_lahir }}</li>
            <li class="list-item"><strong>Status Pernikahan:</strong> {{ $data->status_pernikahan }}</li>
            <li class="list-item"><strong>Pekerjaan:</strong> {{ $data->pekerjaan }}</li>
            <li class="list-item"><strong>Alamat:</strong> {{ $data->alamat }}</li>
            <li class="list-item"><strong>Telah Meninggal Dunia pada:</strong></li>
            <li class="list-item">- <strong>Tanggal:</strong> {{ $data->tanggal_meninggal }}</li>
            <li class="list-item">- <strong>Jam:</strong> {{ $data->jam_meninggal }}</li>
            <li class="list-item"><strong>Tempat Meninggal:</strong> {{ $data->tempat_meninggal }}</li>
            <li class="list-item"><strong>Sebab Kematian:</strong> {{ $data->sebab_meninggal }}</li>
            
        </ul>

        <p>Surat Keterangan ini dibuat untuk Keamanan.</p>
        <p>Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>

        <div id="ttd" class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <p id="camat"><strong>CAMAT BERGAS</strong></p>
              <div id="nama-camat">
                <br />
                <br />
                <strong><u>TRI MARTONO, SH, MM</u></strong><br />
                    Pembina Tk. I<br />
                    NIP. 196703221995031001
                </div>
            </div>
        </div>
    </div>
</body>
</html>
