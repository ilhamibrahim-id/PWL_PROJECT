<!DOCTYPE html>
<html>

<head>
    <title>Cetak Nilai</title>
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
    @foreach ($kode as $kd)
        @foreach ($kls as $klss)
            @if ($klss->kode == $kd->kode_pengajar)
                @foreach ($k as $ks)
                    @if ($ks->id == $klss->kelas_id)
                        <center>
                            <h5>Transkrip Nilai {{ $ks->nama_kelas }}</h5>
                            <br>Nilai Tertinggi =
                            {{ $nilai->where('kode', '=', $kd->kode_pengajar)->where('kelas_id', '=', $ks->id)->max('nilai') }}
                            <br>Nilai Terendah =
                            {{ $nilai->where('kode', '=', $kd->kode_pengajar)->where('kelas_id', '=', $ks->id)->min('nilai') }}
                            <br>Nilai Rata Rata =
                            {{ $nilai->where('kode', '=', $kd->kode_pengajar)->where('kelas_id', '=', $ks->id)->avg('nilai') }}
                        </center>

                        <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Matakuliah</th>
                                    <th>Sks</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $kelasa)
                                    @foreach ($kelasa->matakuliah as $mk)
                                        @if ($mk->pivot->kode == $kd->kode_pengajar && $mk->pivot->kelas_id == $ks->id)
                                            <tr>
                                                <td>
                                                    {{ $kelasa->nim }}
                                                </td>
                                                <td>
                                                    {{ $kelasa->nama }}
                                                </td>
                                                <td>
                                                    {{ $mk->nama_mk }}
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
                            </tbody>
                        </table>
                    @endif
                @endforeach
                <p style="page-break-before: always;"></p>
            @endif
        @endforeach
    @endforeach
</body>

</html>
