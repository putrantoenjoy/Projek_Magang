<!DOCTYPE html>
<html>
<head>
    <title>Laporan User</title>
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
        <h1>Laporan User</h1>
        <p>Kediri</p>
        <p>Email: info@perusahaan.com | Telp: 021-12345678</p>
    </div>
    
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>User Id</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Email</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ '$user->role' }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ '$user->foto' }}</td>
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
