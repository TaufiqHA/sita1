<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | Tambah Judul</title>
</head>
<body>
    <div class="container mx-auto flex flex-col items-center justify-center">
        <h2>halaman tambah judul</h2>
        @if ($errors->any())
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif
        <form action="/judul" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
            @csrf
            <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa_id }}">
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Judul</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="judul" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">konsentrasi</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="konsentrasi" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">teknik pengumpulan data</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="teknik" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">bentuk data</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="bentuk_data" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">metode</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="metode" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">tempat pengambilan data</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="tempat" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">nama calon dosen pembimbing pilihan 1</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nama_dosen1" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">nama calon dosen pembimbing pilihan 2</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nama_dosen2" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">nama calon dosen pembimbing pilihan 3</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nama_dosen3" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">nama calon dosen pembimbing pilihan 4</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nama_dosen4" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Bukti konsultasi</span>
                </div>
                <input type="file" class="file-input file-input-bordered w-full max-w-xs" name="bukti" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">status tugas akhir</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="status" />
            </label>
            <button class="btn btn-success mt-3 w-full" type="submit">tambah</button>
        </form>
    </div>
</body>
</html>
