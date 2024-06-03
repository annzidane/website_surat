<!DOCTYPE html>
<html>
<head>
    <title>Rekap Semua Pengajuan Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Rekap Semua Pengajuan Surat</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal Pengajuan</th>
                <th>Jenis Surat</th>
                <th>Nama Pengaju</th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
                <tr>
                    <td>{{ Carbon\Carbon::parse($record->created_at)->format('d-m-Y') }}</td>
                    <td>{{ class_basename($record) }}</td>
                    <td>{{ $record->user->name ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
