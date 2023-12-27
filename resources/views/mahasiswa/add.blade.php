<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | Tambah Data Diri</title>
</head>
<body>
    <div class="container mx-auto flex flex-col items-center justify-center">
        <h2>ini adalah halaman tambah data mahasiswa</h2>
        <form action="/mahasiswa/{{ auth()->user()->mahasiswa->id }}" method="POST">
            @csrf
            @method('PUT')
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">nama lengkap</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nama" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">NIM</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nim" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">sks</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="sks" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">tanggal ta</span>
                </div>
                <input type="date" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="tanggal_ta" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">surah juz 30 yang telah dihafalkan</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="surah" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">IPK</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="ipk" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">HP yang dapat dihubungi</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="hp" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Dosen PA</span>
                </div>
                <select class="select select-bordered" name="dosen_pa">
                  <option disabled selected>select</option>
                  @foreach ($data as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
            </label>
            <button type="submit" class="btn btn-success w-full">Save</button>
        </form>
    </div>
</body>
</html>
