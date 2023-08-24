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
            <h4>LAPORAN DATA SURAT MASUK</h4>
        </div>
    </center>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>No Surat</th>
            <th>Pengirim</th>
            <th>Penerima</th>
            <th>Perihal</th>
        </tr>
        <tr>
            @foreach ($data as $d)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->no_surat }}</td>
                <td>{{ $d->pengirim }}</td>
                <td>{{ $d->penerima }}</td>
                <td>{{ $d->perihal }}</td>
            @endforeach
        </tr>
    </table>

</body>

</html>
