<!DOCTYPE html>
<html>

<head>
    <title>Nilai {{ $data->nama }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Transkrip Nilai {{ $data->nama }}</h5>
        <br>Nim {{ $data->nim }}
        @foreach ($kelas as $kelasa)
            <br> Kelas {{ $kelasa->kelas->nama_kelas }}
        @endforeach
        <br> Rata-Rata = {{ $nilai->avg('nilai') }}
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Matakuliah</th>
                <th>Dosen</th>
                <th>Sks</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $kelasa)
                @foreach ($kelasa->matakuliah as $mk)
                    @foreach ($mk->dosen as $dsn)
                        @if ($mk->pivot->kode == $dsn->pivot->kode_pengajar)
                            <tr>
                                <td>
                                    {{ $mk->nama_mk }}
                                </td>
                                <td>
                                    {{ $dsn->nama }}
                                </td>
                                <td>
                                    {{ $mk->sks }}
                                </td>
                                <td>
                                    {{ $mk->pivot->nilai }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>
