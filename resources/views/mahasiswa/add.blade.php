@extends('layouts.main')

@section('container')
    <div class="w-full h-full overflow-y-auto " >
        <form action="/mahasiswa/{{ auth()->user()->mahasiswa->id }}" method="POST" class="flex flex-col gap-5">
            @csrf
            @method('PUT')
            <div class="w-full h-full flex gap-5" >
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Nama Lengkap</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="nama" value="{{ $mahasiswa->nama }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">NIM</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="nim" value="{{ $mahasiswa->nim }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Angkatan</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="angkatan" value="{{ $mahasiswa->angkatan }}" />
                </label>
            </div>
            <div class="w-full h-full flex gap-5" >
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md ">Fakultas</span>
                    </div>
                    <select class="select select-bordered" name="fakultas">
                        <option disabled {{ $mahasiswa->fakultas === null ? 'selected' : '' }} >select</option>
                        @foreach ($fakultas as $item)
                            <option value="{{ $item->fakultas }}" {{ $mahasiswa->fakultas === $item->fakultas ? 'selected' : '' }} >{{ $item->fakultas }}</option>
                        @endforeach
                    </select>
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md ">Jurusan</span>
                    </div>
                    <select class="select select-bordered" name="jurusan">
                        <option disabled {{ $mahasiswa->jurusan === null ? 'selected' : '' }} >select</option>
                        @foreach ($jurusan as $item)
                            <option value="{{ $item->jurusan }}" {{ $mahasiswa->jurusan === $item->jurusan ? 'selected' : '' }}  >{{ $item->jurusan }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <div class="w-full h-full flex gap-5" >
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Jumlah SKS yang telah ditempuh (lulus)
                        </span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="sks" value="{{ $mahasiswa->sks }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Tanggal Pendaftaran TA</span>
                    </div>
                    <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="tanggal_ta" value="{{ $mahasiswa->tanggal_ta }}" />
                </label>
            </div>
            <div class="w-full h-full flex gap-5" >
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Jumlah Surah Juz 30 dari Al-quran yang telah dihafalkan</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="surah" value="{{ $mahasiswa->surah }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Indeks Prestasi Kumulatif (IPK)</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="ipk" value="{{ $mahasiswa->ipk }}" />
                </label>
            </div>
            <div class="w-full h-full flex gap-5" >
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">No. HP yang dapat dihubungi</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="hp" value="{{ $mahasiswa->hp }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-md">Dosen PA</span>
                    </div>
                    <select class="select select-bordered" name="dosen_pa">
                        <option disabled {{ $mahasiswa->dosen_pa ? '' : 'selected' }}>select</option>
                        @foreach ($data as $item)
                            <option value="{{ $item->id }}" {{ $mahasiswa->dosen_pa === $item->id ? 'selected' : '' }} >{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <button type="submit" class="btn btn-success w-full">Save</button>
        </form>
    </div>
@endsection
