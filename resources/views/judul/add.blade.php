@extends('layouts.main')

@section('container')
    <div class="overflow-x-auto w-full">
        <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($judul as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
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
                        <button class="btn btn-warning" onclick="my_modal{{ $item->id }}.showModal()">Detail</button>
                        <dialog id="my_modal{{ $item->id }}" class="modal">
                            <div class="modal-box w-11/12 max-w-5xl">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h2 class="font-semibold text-md">Detail Judul</h2>
                                @if ($item->status === 'Diterima')
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
                                @elseif($item->status === 'Ditolak')
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
                                            <label class="form-control w-full h-full grow">
                                                <div class="label">
                                                    <span class="label-text text-xs font-semibold">Alasan Penolakan</span>
                                                </div>
                                                <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly >{{ $item->alasan_penolakan }}</textarea>
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
                                @endif
                            </div>
                        </dialog>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    @if ($jumlah < 3)
        <button class="btn mt-5 btn-success" onclick="my_modal_3.showModal()">Tambah Judul</button>
    @endif
    <dialog id="my_modal_3" class="modal">
    <div class="modal-box w-11/12 max-w-6xl">
        <form method="dialog">
        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg">Tambah Judul</h3>
        <div class="w-full h-full overflow-y-auto">
            <form action="/judul" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                @csrf
                <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}">
                <input type="hidden" name="tanggal_pengajuan" value="{{ now() }}">
                <div class="w-full h-full flex gap-5" >
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg ">NIM</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $mahasiswa->nim }}" readonly />
                    </label>
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg ">Nama</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $mahasiswa->nama }}" readonly />
                    </label>
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Konsentrasi</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="konsentrasi" required />
                    </label>
                </div>
                <div class="w-full h-full flex gap-5" >
                    <label class="form-control w-full grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg ">Judul</span>
                        </div>
                        <textarea class="textarea textarea-bordered h-24" placeholder="type here" name="judul" required></textarea>
                    </label>
                </div>
                <div class="w-full h-full flex gap-5" >
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Teknik Pengumpulan Data</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="teknik" required />
                    </label>
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Bentuk Data</span>
                        </div>
                        <select class="select select-bordered" name="bentuk_data" required>
                            <option disabled selected>Pilih</option>
                            <option value="Primer" >Primer</option>
                            <option value="Sekunder" >Sekunder</option>
                        </select>
                    </label>
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Metode Analisis yang Digunakan</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="metode" required />
                    </label>
                </div>
                <div class="w-full h-full flex gap-5">
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Tempat Pengumpulan Data</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="tempat" required />
                    </label>
                    <label class="form-control w-full max-w-xl">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Bukti konsultasi</span>
                        </div>
                        <input type="file" class="file-input file-input-bordered w-full max-w-xl" name="bukti" required />
                    </label>
                </div>
                <div class="w-full h-full flex gap-5" >
                    <label class="form-control w-full max-w-xl">
                        <div class="label">
                            <span class="label-text font-semibold text-xs">Calon Dosen Pembimbing Pilihan 1</span>
                        </div>
                        <select class="select select-bordered" name="nama_dosen1" required>
                            <option disabled selected>Pilih</option>
                            @foreach ($dosen as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="form-control w-full max-w-xl">
                        <div class="label">
                            <span class="label-text font-semibold text-xs">Calon Dosen Pembimbing Pilihan 2</span>
                        </div>
                        <select class="select select-bordered" name="nama_dosen2" required>
                            <option disabled selected>Pilih</option>
                            @foreach ($dosen as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="form-control w-full max-w-xl">
                        <div class="label">
                            <span class="label-text font-semibold text-xs">Calon Dosen Pembimbing Pilihan 3</span>
                        </div>
                        <select class="select select-bordered" name="nama_dosen3" required>
                            <option disabled selected>Pilih</option>
                            @foreach ($dosen as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                    <label class="form-control w-full max-w-xl">
                        <div class="label">
                            <span class="label-text font-semibold text-xs">Calon Dosen Pembimbing Pilihan 4</span>
                        </div>
                        <select class="select select-bordered" name="nama_dosen4" required>
                            <option disabled selected>Pilih</option>
                            @foreach ($dosen as $item)
                                <option value="{{ $item->id }}" >{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <input type="hidden" name="status" value="Diajukan" />
                <input type="hidden" name="dospem1" value="-">
                <input type="hidden" name="dospem2" value="-">
                <button class="btn btn-success mt-3 w-full max-w-xl" type="submit">tambah</button>
            </form>
        </div>
    </div>
    </dialog>
@endsection
