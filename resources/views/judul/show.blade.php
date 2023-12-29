@extends('layouts.kajur')

@section('container')
    <div class="w-full h-full overflow-y-auto" >
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
                                <form action="/judul/{{ $judul->id }}" method="POST" class="flex gap-3">
                                    @csrf
                                    @method('put')
                                    <label class="form-control w-full max-w-xs">
                                        <select class="select select-bordered" name="status">
                                        <option disabled selected>select</option>
                                        <option value="Disetujui">Disetujui </option>
                                        <option value="Ditolak">Ditolak</option>
                                        </select>
                                    </label>
                                    <button type="submit" class="btn btn-success">save</button>
                                </form>
                            @endif
                            @if ($role === 'mahasiswa')
                                @if ($judul->status === 'Disetujui')
                                <h2 class="btn btn-success " >
                                    {{ $judul->status }}
                                </h2>
                                @elseif ($judul->status === 'Ditolak')
                                <h2 class="btn btn-error " >
                                    {{ $judul->status }}
                                </h2>
                                @else
                                <h2 class="btn btn-warning " >
                                    {{ $judul->status }}
                                </h2>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @if ($role === 'kajur')
                    <tr>
                        <th>Dosen Pembimbing 1</th>
                        <td>
                            <form action="/judul/{{ $judul->id }}" method="POST" class="flex gap-3">
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
                        </td>
                    </tr>
                    <tr>
                        <th>Dosen Pembimbing 2</th>
                        <td>
                            <form action="/judul/{{ $judul->id }}" method="POST" class="flex gap-3">
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
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
