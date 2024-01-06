@extends('layouts.dosen')

@section('container')
    <div class="w-full h-full overflow-y-auto" >
        <form action="{{ route('updateDosen', ['dosen' => auth()->user()->dosen->id]) }}" method="POST" class="flex flex-col gap-5">
            @csrf
            @method('PUT')
            <div class="w-full h-full flex gap-5" >
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Nama Lengkap</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="nama" value="{{ $dosen->nama }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">NIP</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="nip" value="{{ $dosen->nip }}" />
                </label>
            </div>
            <div class="w-full h-full flex gap-5" >
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Jabatan</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="jabatan" value="{{ $dosen->jabatan }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Kategori Pegawai</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="kategori" value="{{ $dosen->kategori }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Status Kepegawaian</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="status" value="{{ $dosen->status }}" />
                </label>
            </div>
            <button type="submit" class="btn btn-success w-full max-w-md">Save</button>
        </form>
    </div>
@endsection
