@extends('layouts.main')

@section('container')
    <div class="overflow-x-auto w-full">
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
            @foreach ($judul as $item)
                <tr>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->dospem1 }}</td>
                    <td>{{ $item->dospem2 }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                        <!-- You can open the modal using ID.showModal() method -->
                        <button class="btn btn-warning" onclick="my_modal_{{ $item->id }}.showModal()">show</button>
                        <dialog id="my_modal_{{ $item->id }}" class="modal">
                            <div class="modal-box w-11/12 max-w-5xl">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <h2 class="font-semibold text-md">Detail Judul</h2>
                                <div class="w-full h-full flex flex-col gap-5" >
                                    <div class="w-full h-full flex gap-5">
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Judul</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly >{{ $item->judul }}</textarea>
                                        </label>
                                        <label class="form-control w-26 h-full grow-0">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Konsentrasi</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->konsentrasi }}</textarea>
                                        </label>
                                    </div>
                                    <div class="w-full h-full flex gap-5" >
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Metode Analisis yang Digunakan</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->metode }}</textarea>
                                        </label>
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Teknik Pengumpulan Data</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->teknik }}</textarea>
                                        </label>
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Bentuk Data</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->bentuk_data }}</textarea>
                                        </label>
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Tempat Pengumpulan Data</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->tempat }}</textarea>
                                        </label>
                                    </div>
                                    <div class="w-full h-full flex gap-5" >
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 1</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->nama_dosen1 }}</textarea>
                                        </label>
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 2</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->nama_dosen2 }}</textarea>
                                        </label>
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 3</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->nama_dosen3 }}</textarea>
                                        </label>
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 4</span>
                                            </div>
                                            <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $item->nama_dosen4 }}</textarea>
                                        </label>
                                    </div>
                                    <div>
                                        <label class="form-control w-full h-full grow">
                                            <div class="label">
                                                <span class="label-text text-xs font-semibold">Bukti Konsultasi</span>
                                            </div>
                                            <a href="{{ route('download', ['judul' => $item->id]) }}" class="link ms-1">Downlaod</a>
                                        </label>
                                    </div>
                                </div>
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
                <div class="w-full h-full flex gap-5" >
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg ">Nama</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $mahasiswa->nama }}" readonly />
                    </label>
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg ">NIM</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $mahasiswa->nim }}" readonly />
                    </label>
                </div>
                <div class="w-full h-full flex gap-5" >
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg ">Judul</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="judul" required />
                    </label>
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Konsentrasi</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="konsentrasi" required />
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
                </div>
                <div class="w-full h-full flex gap-5">
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Metode Analisis yang Digunakan</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="metode" required />
                    </label>
                    <label class="form-control w-full max-w-xl grow">
                        <div class="label">
                            <span class="label-text font-semibold text-lg">Tempat Pengumpulan Data</span>
                        </div>
                        <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="tempat" required />
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
                                <option value="{{ $item->nama }}" >{{ $item->nama }}</option>
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
                                <option value="{{ $item->nama }}" >{{ $item->nama }}</option>
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
                                <option value="{{ $item->nama }}" >{{ $item->nama }}</option>
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
                                <option value="{{ $item->nama }}" >{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <label class="form-control w-full max-w-xl">
                    <div class="label">
                        <span class="label-text font-semibold text-lg">Bukti konsultasi</span>
                    </div>
                    <input type="file" class="file-input file-input-bordered w-full max-w-xl" name="bukti" required />
                </label>
                <input type="hidden" name="status" value="Diajukan" />
                <input type="hidden" name="dospem1" value="-">
                <input type="hidden" name="dospem2" value="-">
                <button class="btn btn-success mt-3 w-full max-w-xl" type="submit">tambah</button>
            </form>
        </div>
    </div>
    </dialog>
@endsection
