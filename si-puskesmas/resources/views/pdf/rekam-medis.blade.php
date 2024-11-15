<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        h1 {
            text-transform: uppercase;
            text-align: center;
            font-size: 14pt;
        }

        h2 {
            text-transform: uppercase;
            font-size: 12pt;
            font-weight: bold;
        }

        .cetak {
            font-size: 10pt;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 9pt;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        /* Add stripes */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            width: 100%;
        }
    </style>
</head>

<body>
    <img src="{{public_path().'/images/kop.png'}}" />
    <h1>{{ $title }}</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pasien</th>
                <th>NIK</th>
                <th>Keluhan</th>
                <th>Diagnosa</th>
                <th>Tanggal Kunjungan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$d->kunjungan->pasien->nama_pasien}}</td>
                <td>{{$d->kunjungan->pasien->nik}}</td>
                <td>{{$d->keluhan}}</td>
                <td>{{$d->diagnosa}}</td>
                <td>{{$d->kunjungan->tanggal_kunjungan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>