<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | Tambah Dosen</title>
</head>
<body>
    <div class="container mx-auto flex flex-col items-center justify-center">
        <h2>ini adalah halaman tambah data dosen</h2>
        @if ($errors->any())
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif
        <form action="/dosen/{{ auth()->user()->dosen->id }}" method="POST">
            @csrf
            @method('put')
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">nama lengkap</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nama" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">NIP</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="nip" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Jabatan</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="jabatan" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Kategori Kepegawaian</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="kategori" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Status Kepegawaian</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="status" />
            </label>
            <button class="btn btn-success w-full" type="submit" >Save</button>
        </form>
    </div>
</body>
</html>
