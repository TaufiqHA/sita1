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
                            @if (count($item->judul) === 0)
                                Belum Mengajukan
                            @else
                                Diajukan
                            @endif
                        </td>
                        <td>
                            <!-- You can open the modal using ID.showModal() method -->
                            <button class="btn btn-warning" onclick="my_modal_{{ $item->id }}.showModal()">show</button>
                            <dialog id="my_modal_{{ $item->id }}" class="modal">
                            <div class="modal-box w-11/12 max-w-5xl">
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                </form>
                                <div class="w-full h-ful carousel rounded-box">
                                    @foreach ($item->judul as $judul)
                                    <div class="carousel-item w-full h-full">
                                        <div class="w-full h-full flex flex-col gap-5" >
                                            <div class="w-full h-full flex gap-5">
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Judul</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly >{{ $judul->judul }}</textarea>
                                                </label>
                                                <label class="form-control w-26 h-full grow-0">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Konsentrasi</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->konsentrasi }}</textarea>
                                                </label>
                                            </div>
                                            <div class="w-full h-full flex gap-5" >
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Metode Analisis yang Digunakan</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->metode }}</textarea>
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Teknik Pengumpulan Data</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->teknik }}</textarea>
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Bentuk Data</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->bentuk_data }}</textarea>
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Tempat Pengumpulan Data</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->tempat }}</textarea>
                                                </label>
                                            </div>
                                            <div class="w-full h-full flex gap-5" >
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 1</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->nama_dosen1 }}</textarea>
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 2</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->nama_dosen2 }}</textarea>
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 3</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->nama_dosen3 }}</textarea>
                                                </label>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 4</span>
                                                    </div>
                                                    <textarea class="textarea textarea-bordered h-24" placeholder="Bio" readonly>{{ $judul->nama_dosen4 }}</textarea>
                                                </label>
                                            </div>
                                            <div>
                                                <label class="form-control w-full h-full grow">
                                                    <div class="label">
                                                        <span class="label-text text-xs font-semibold">Bukti Konsultasi</span>
                                                    </div>
                                                    <a href="{{ route('download', ['judul' => $judul->id]) }}" class="link ms-1">Download</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            </dialog>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
