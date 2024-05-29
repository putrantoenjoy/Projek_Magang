<!DOCTYPE html>
<html>
<head>
    <title>Laporan Artikel</title>
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
        <h1>Laporan Artikel</h1>
        <p>Kediri</p>
        <p>Email: info@perusahaan.com | Telp: 021-12345678</p>
    </div>
    
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Post id</th>
                <th>User Id</th>
                <th>Penulis</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Konten</th>
                <th>Tag</th>
                <th>Tanggal Posting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $artikel)
            <tr>
                <td>{{ $artikel->id }} </td>
                <td>{{ $artikel->user_id }} </td>
                <td>{{ $artikel->user->name }} </td>
                <td>{{ $artikel->judul }} </td>
                <td>{{ $artikel->deskripsi }} </td>
                <td>{{ $artikel->kategori->nama }} </td>
                <td><a href="{{ route('artikel-kami.show', $artikel->id)}}"> Lihat Artikel </a> </td>
                <td>{{ $artikel->tags }} </td>
                <td>{{ $artikel->created_at }} </td>
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
