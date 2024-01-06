@extends('layouts.kajur')

@section('container')
    <div class="w-full h-full overflow-y-auto" >
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                    <th>Nama</th>
                    <th>Angkatan</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($mahasiswa as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>2020</td>
                        <td>
                            @if ($item->statusTA === 'Diterima')
                                <div class="btn btn-success" >
                                    {{ $item->statusTA }}
                                </div>
                            @elseif ($item->statusTA === 'Belum mengajukan')
                                <div class="btn btn-error" >
                                    {{ $item->statusTA }}
                                </div>
                            @elseif ($item->statusTA === 'Diajukan')
                                <div class="btn btn-warning" >
                                    {{ $item->statusTA }}
                                </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('showJudulMahasiswa', ['mahasiswa' => $item->id]) }}" class="btn btn-warning" >Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
