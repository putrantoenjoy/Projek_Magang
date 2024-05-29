<!DOCTYPE html>
<html>
<head>
    <title>Laporan Tim</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
        .kop-laporan {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop-laporan h1 {
            font-size: 16pt;
        }
        .kop-laporan p {
            font-size: 10pt;
            margin: 0;
        }
        .ttd-section {
            margin-top: 50px;
            text-align: right;
            font-size: 10pt;
        }
        .ttd-section .ttd {
            margin-top: 70px;
        }
    </style>
    
    <div class="kop-laporan">
        <h1>Laporan Tim Kerja</h1>
        <p>Kediri</p>
        <p>Email: info@perusahaan.com | Telp: 021-12345678</p>
    </div>
    
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                {{-- <th>Foto Profil</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row => $value)
            <tr class="align-middle">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->jabatan }}</td>
                {{-- <td><img src="{{ url('storage/img/tim/'. $value->foto) }}" alt="foto" width="50px" height="50px" style="object-fit: cover"></td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="ttd-section">
        <p>Kediri, {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        <p class="ttd">______________________</p>
        
    </div>
</body>
</html>
