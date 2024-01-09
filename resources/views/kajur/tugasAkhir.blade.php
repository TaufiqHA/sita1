@extends('layouts.kajur')

@section('container')
<div class="flex gap-5 items-center mb-5">
    <div class="dropdown">
        <div tabindex="0" role="button" class="btn m-1">Status</div>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
            <li><a id="diterima" >Diterima</a></li>
            <li><a id="ditolak" >Ditolak</a></li>
            <li><a id="diajukan" >Diajukan</a></li>
            <li><a id="semua" >Semua</a></li>
        </ul>
    </div>
</div>
<div id="content" >
    <div class="w-full flex gap-5 flex-col">
        <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center" >
                                Nama
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Judul
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal Pengajuan
                                <a href="#" id="tanggalPengajuan"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Status
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($judul as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->mahasiswa->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->judul }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->tanggal_pengajuan }}
                            </td>
                            <td class="px-6 py-4">
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
                            <td class="px-6 py-4 text-right">
                                @if ($item->status === 'Diterima')
                                    <button class="btn btn-warning" onclick="my_modal{{ $item->id }}.showModal()">Detail</button>
                                    <dialog id="my_modal{{ $item->id }}" class="modal">
                                        <div class="modal-box w-11/12 max-w-5xl">
                                            <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                            </form>
                                            <h2 class="font-semibold text-md text-start">Detail Judul</h2>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
