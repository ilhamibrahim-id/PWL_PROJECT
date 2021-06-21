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
          <br>  Rata-Rata = {{ $nilai->avg('nilai') }}
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>Kelas</th>
                <th>Matakuliah</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $kelasa)
                @foreach ($kelasa->matakuliah as $mk)
                    <tr>
                        <td>
                            {{ $kelasa->kelas->nama_kelas }}
                        </td>
                        <td>
                            {{ $mk->nama_mk }}
                        </td>
                        <td>
                            {{ $mk->pivot->nilai }}
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

</body>

</html>
