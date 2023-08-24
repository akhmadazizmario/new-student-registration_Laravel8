<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <img src="assets_admin/img/gambarsurat.png" alt="" width="700px" height="200px">
    <center>
        <div class="d-flex justify-content-center">
            <h4>LAPORAN DATA SISWA BARU</h4>
        </div>
    </center>
    <table id="bootstrap-data-table-export" class="table table-sm table-hover table-borderless">
        <tr>
            <th>dicetak pada</th>
            <td>:</td>
            <td>
                {{ date('Y-m-d') }}
            </td>
        </tr>
        <tr>
            <th>Jumlah siswa</th>
            <td>:</td>
            <td>{{ $siswabaru }}</td>
        </tr>
    </table>
    <br><br>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nik</th>
            <th>Tempat, Tgl Lahir</th>
            <th>No Hp</th>
            <th>Jenis Kelamin</th>
            <th>Status</th>
        </tr>
        <tr>
            @foreach ($data as $d)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->nama_lengkap }}</td>
                <td>{{ $d->nik }}</td>
                <td>{{ $d->tempat_lahir }}, {{ $d->tgl_lahir }}</td>
                <td>{{ $d->no_hp }}</td>
                <td>{{ $d->jenis_kelamin }}</td>
                <td>{{ $d->status }}</td>
            @endforeach
        </tr>
    </table>

</body>

</html>
