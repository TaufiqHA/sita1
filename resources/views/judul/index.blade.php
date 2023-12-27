<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | List Judul</title>
</head>
<body>
    <div class="container mx-auto flex flex-col items-center justify-center">
        <h2>halaman list judul</h2>
        <div class="overflow-x-auto">
            <table class="table">
              <thead>
                <tr>
                  <th>Judul</th>
                  <th>Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($judul as $item)
                    <tr>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->mahasiswa->nama }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/judul/{{ $item->id }}" class="btn btn-warning">show</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
</body>
</html>
