@extends('layouts.' . $role)

@section('container')
    <div class="w-full h-full overflow-y-auto" >
        <form action="/user/{{ auth()->user()->id }}" class="flex flex-col gap-5" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="w-full h-full flex gap-5" >
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-lg">Username</span>
                    </div>
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="username" value="{{ $user->username }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-lg">Email</span>
                    </div>
                    <input type="email" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="email" value="{{ $user->email }}" />
                </label>
            </div>
            <div>
                <div class="avatar">
                    <div class="w-24 rounded-full">
                        <img src="{{ $avatar ? asset('/storage/' . $avatar) : asset('img/user1.png') }}" />
                    </div>
                </div>
                <label class="form-control w-full max-w-xl">
                    <div class="label">
                        <span class="label-text font-semibold text-lg">Upload gambar</span>
                    </div>
                    <input type="file" class="file-input file-input-bordered w-full max-w-xl" name="avatar" />
                </label>
            </div>
            <label class="relative inline-flex items-center cursor-pointer w-full max-w-sm">
                <input type="checkbox" value="" class="sr-only peer theme-controller" @if ($user->tema === 'light')
                    checked
                @endif>
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium @if ($user->tema === 'light')
                    text-black
                @else
                    text-gray-400
                @endif">Light mode</span>
            </label>
            <button class="btn btn-success w-full max-w-xl" >Save</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const themeController = document.querySelector('.theme-controller');

        themeController.addEventListener('change', function () {
            const themeValue = themeController.checked ? 'light' : 'dark';
            // Kirim ke server menggunakan AJAX
            fetch('/update-theme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Anda mungkin perlu mengatur CSRF token
                },
                body: JSON.stringify({ tema: themeValue })
            })
            .then(response => {
                if (response.ok) {
                    console.log('Tema berhasil diubah.');
                } else {
                    console.error('Gagal mengubah tema.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
    </script>
@endsection
