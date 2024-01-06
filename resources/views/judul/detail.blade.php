@extends('layouts.kajur')

@section('container')
    <div class="w-full h-full overflow-y-auto" >
        <form action="{{ route('terimaJudul', ['judul' => $judul->id]) }}" method="POST" class="w-full h-full flex flex-col gap-5" >
            @csrf
            <input type="hidden" name="judul_id" value="{{ $judul->id }}">
            <input type="hidden" name="tanggal_disetujui" value="{{ now() }}">
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
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ $judul->nama_dosen1 }}" readonly />
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Pembimbing 1</span>
                            <input type="checkbox" class="toggle" id="toggleButton" />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Pembimbing 2</span>
                            <input type="checkbox" class="toggle" id="toggleButton1" />
                        </label>
                    </div>
                    <input type="hidden" name="" id="additionalInput" value="{{ $judul->nama_dosen1 }}">
                </label>
                <label class="form-control w-full h-full grow">
                    <div class="label">
                        <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 2</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ $judul->nama_dosen2 }}" readonly />
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Pembimbing 1</span>
                            <input type="checkbox" class="toggle" id="toggleButton2" />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Pembimbing 2</span>
                            <input type="checkbox" class="toggle" id="toggleButton3" />
                        </label>
                    </div>
                    <input type="hidden" name="" id="additionalInput1" value="{{ $judul->nama_dosen2 }}">
                </label>
                <label class="form-control w-full h-full grow">
                    <div class="label">
                        <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 3</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ $judul->nama_dosen3 }}" readonly />
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Pembimbing 1</span>
                            <input type="checkbox" class="toggle" id="toggleButton4" />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Pembimbing 2</span>
                            <input type="checkbox" class="toggle" id="toggleButton5" />
                        </label>
                    </div>
                    <input type="hidden" name="" id="additionalInput2" value="{{ $judul->nama_dosen3 }}">
                </label>
                <label class="form-control w-full h-full grow">
                    <div class="label">
                        <span class="label-text text-xs font-semibold">Calon Dosen Pembimbing 4</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" value="{{ $judul->nama_dosen4 }}" readonly />
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Pembimbing 1</span>
                            <input type="checkbox" class="toggle" id="toggleButton6" />
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Pembimbing 2</span>
                            <input type="checkbox" class="toggle" id="toggleButton7" />
                        </label>
                    </div>
                    <input type="hidden" name="" id="additionalInput3" value="{{ $judul->nama_dosen4 }}">
                </label>
            </div>
            <div>
                <label class="form-control w-full h-full grow">
                    <div class="label">
                        <span class="label-text text-xs font-semibold">Bukti Konsultasi</span>
                    </div>
                    <a href="{{ route('download', ['judul' => $judul->id]) }}" class="link ms-1">Downlaod</a>
                </label>
            </div>
            <button class="btn btn-success w-full" >Terima</button>
            <a href="{{ route('tolakJudul', ['judul' => $judul->id]) }}" class="btn btn-error w-full">
                Tolak
            </a>
            <a href="{{ route('showJudulMahasiswa', ['mahasiswa' => $judul->mahasiswa->id]) }}" class="btn bg-gray-400 text-black w-full" >
                <div class="w-full h-full flex gap-4 items-center justify-center" >
                    <img src="{{ asset('svg/arrow_left.svg') }}" alt="arrow left" class="w-5">
                    <h2>list judul</h2>
                </div>
            </a>
        </form>
    </div>
@endsection
