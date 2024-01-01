@extends('layouts.kajur')

@section('container')
    <div class="w-full h-full" >
        <div class="overflow-x-auto">
            <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa->judul as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('showJudul', ['judul' => $item->id]) }}" class="btn btn-warning" >Show</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@endsection
