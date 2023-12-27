<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | Edit Judul</title>
</head>
<body>
    <div class="container mx-auto flex flex-col items-center justify-center">
        <h2>halaman edit judul</h2>
        <div class="overflow-x-auto">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Judul</th>
                        <td>{{ $judul->judul }}</td>
                    </tr>
                    <tr>
                        <th>Konsentrasi</th>
                        <td>{{ $judul->konsentrasi }}</td>
                    </tr>
                    <tr>
                        <th>metode</th>
                        <td>{{ $judul->metode }}</td>
                    </tr>
                    <tr>
                        <th>teknik</th>
                        <td>{{ $judul->teknik }}</td>
                    </tr>
                    <tr>
                        <th>bentuk data</th>
                        <td>{{ $judul->bentuk_data }}</td>
                    </tr>
                    <tr>
                        <th>tempat</th>
                        <td>{{ $judul->tempat }}</td>
                    </tr>
                    <tr>
                        <th>nama calon dosen pembimbing pilihan 1</th>
                        <td>{{ $judul->nama_dosen1 }}</td>
                    </tr>
                    <tr>
                        <th>nama calon dosen pembimbing pilihan 2</th>
                        <td>{{ $judul->nama_dosen2 }}</td>
                    </tr>
                    <tr>
                        <th>nama calon dosen pembimbing pilihan 3</th>
                        <td>{{ $judul->nama_dosen3 }}</td>
                    </tr>
                    <tr>
                        <th>nama calon dosen pembimbing pilihan 4</th>
                        <td>{{ $judul->nama_dosen4 }}</td>
                    </tr>
                    <tr>
                        <th>status</th>
                        <td>
                            @if ($role === 'kajur')
                                <form action="/judul/{{ $judul->id }}" method="POST" class="flex justify-center gap-3">
                                    @csrf
                                    @method('put')
                                    <label class="form-control w-full max-w-xs">
                                        <select class="select select-bordered" name="status">
                                        <option disabled selected>select</option>
                                        <option value="disetujui">disetujui </option>
                                        <option value="ditolak">ditolak</option>
                                        </select>
                                    </label>
                                    <button type="submit" class="btn btn-success">save</button>
                                </form>
                            @endif
                            @if ($role === 'mahasiswa')
                                {{ $judul->status }}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
          </div>
    </div>
</body>
</html>
