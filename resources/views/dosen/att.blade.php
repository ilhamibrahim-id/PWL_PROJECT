<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <hr />
                        <table class="table">
                            <thead class=" text-primary">
                                <thead>
                                    <tr>
                                        <th>Matakuliah</th>
                                        <th>Kode Pengajar</th>
                                        <th>SKS</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($dsn->matakuliah as $kelasa)
                                    <tr>
                                        <td>
                                            {{ $kelasa->nama_mk }}
                                        </td>
                                        <td>
                                            {{ $kelasa->pivot->kode_pengajar }}
                                        </td>
                                        <td>
                                            {{ $kelasa->sks }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
