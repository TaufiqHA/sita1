@extends('layouts.kajur')

@section('container')
    <div class="w-full h-full" >
        <a href="{{ url('/judul') }}" class="btn bg-gray-400 text-black" >
            <div class="w-full h-full flex gap-4 items-center" >
                <img src="{{ asset('svg/arrow_left.svg') }}" alt="arrow left" class="w-5">
                <h2>Tugas Akhir</h2>
            </div>
        </a>
        <div class="overflow-x-auto">
            <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Dosen Pembimbing 1</th>
                    <th>Dosen Pembimbing 2</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa->judul as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>
                            @if ($item->skripsi)
                                {{ $item->skripsi->dospem1->nama }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($item->skripsi)
                                {{ $item->skripsi->dospem2->nama }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($item->status === 'Diterima')
                                <div class="btn btn-success" >
                                    {{ $item->status }}
                                </div>
                            @elseif ($item->status === 'Ditolak')
                                <div class="btn btn-error" >
                                    {{ $item->status }}
                                </div>
                            @elseif ($item->status === 'Diajukan')
                                <div class="btn btn-warning" >
                                    {{ $item->status }}
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($item->status === 'Diterima')
                                <button class="btn btn-warning" onclick="my_modal{{ $item->id }}.showModal()">Detail</button>
                                <dialog id="my_modal{{ $item->id }}" class="modal">
                                    <div class="modal-box w-11/12 max-w-5xl">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h2 class="font-semibold text-md">Detail Judul</h2>
                                        <div class="w-full h-full flex flex-col gap-5" >
                                            <div class="w-full h-full flex gap-5">
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Nama</span>
                                                    </div>
                                                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->mahasiswa->nama }}" readonly />
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">NIM</span>
                                                    </div>
                                                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->mahasiswa->nim }}" readonly />
                                                </label>
                                            </div>
                                            <div class="w-full h-full flex gap-5">
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Judul</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly >{{ $item->judul }}</textarea>
                                                </label>
                                            </div>
                                            <div class="w-full h-full flex gap-5" >
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Dosen Pembimbing 1</span>
                                                    </div>
                                                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->skripsi->dospem1->nama }}" readonly />
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Dosen Pembimbing 2</span>
                                                    </div>
                                                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->skripsi->dospem2->nama }}" readonly />
                                                </label>
                                            </div>
                                            <div class="w-full h-full flex gap-5" >
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Tanggal Pengajuan</span>
                                                    </div>
                                                    <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->tanggal_pengajuan }}" readonly />
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Tanggal Disetujui</span>
                                                    </div>
                                                    <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->skripsi->tanggal_disetujui }}" readonly />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </dialog>
                            @elseif ($item->status === 'Ditolak')
                                <button class="btn btn-warning" onclick="my_modal{{ $item->id }}.showModal()">Detail</button>
                                <dialog id="my_modal{{ $item->id }}" class="modal">
                                    <div class="modal-box w-11/12 max-w-5xl">
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <h2 class="font-semibold text-md">Detail Judul</h2>
                                        <div class="w-full h-full flex flex-col gap-5" >
                                            <div class="w-full h-full flex gap-5">
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Nama</span>
                                                    </div>
                                                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->mahasiswa->nama }}" readonly />
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">NIM</span>
                                                    </div>
                                                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->mahasiswa->nim }}" readonly />
                                                </label>
                                            </div>
                                            <div class="w-full h-full flex gap-5">
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Judul</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly >{{ $item->judul }}</textarea>
                                                </label>
                                            </div>
                                            <div class="w-full h-full flex gap-5" >
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Tanggal Pengajuan</span>
                                                    </div>
                                                    <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->tanggal_pengajuan }}" readonly />
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Tanggal Ditolak</span>
                                                    </div>
                                                    <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $item->tanggal_ditolak }}" readonly />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </dialog>
                            @else
                                <a href="{{ route('showJudul', ['judul' => $item->id]) }}" class="btn btn-warning" >Detail</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
