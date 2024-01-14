<!DOCTYPE html>
<html lang="en" data-theme=@if (auth()->user()->tema === 'light')
    "light"
@else
    "dark"
@endif>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | {{ $title }}</title>
</head>
<body>
    <div class="w-full h-screen flex overflow-hidden">
        <div class="w-[15%] h-screen @if (auth()->user()->tema === 'light')
            bg-gray-300
            @else
            bg-gray-500
        @endif">
            <a href="/admin" class="my-7 w-full flex justify-center" >
                <img src="{{ asset('/img/logo_sita.png') }}" alt="logo sita" class="w-[60%]">
            </a>
            <div class="w-full h-[50%] flex flex-col items-center justify-center px-5 mt-20 font-semibold">
                <a href="/mahasiswa" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center @if ($title === "Dashboard")
                p-5 rounded-lg bg-gray-300 text-black w-full text-center
                @endif">Dashboard</a>
                <a href="{{ route('user.create') }}" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center @if ($title === "Tambah User")
                p-5 rounded-lg bg-gray-300 text-black w-full text-center
                @endif" >User</a>
                <a href="{{ route('admin.judul') }}" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center @if ($title === "Tugas Akhir")
                p-5 rounded-lg bg-gray-300 text-black w-full text-center
                @endif" >Tugas Akhir</a>
                <a href="/logout" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center" >Logout</a>
            </div>
        </div>
        <div class="flex-2 w-[85%] h-full p-8 flex-col">
            <div class="flex-1 w-full h-[15%] flex justify-between">
                <div class="flex flex-col gap-3 justify-center">
                    <h2 class="font-semibold text-3xl">{{ $title }}</h2>
                    @if ($title === "Dashboard")
                        <p class="font-semibold text-lg">Selamat Datang Admin</p>
                    @endif
                </div>
                <div>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="avatar w-12">
                            <div class="w-24 rounded-full">
                                <img src="{{ $avatar ? asset('/storage/' . $avatar) : asset('img/user1.png') }}" />
                            </div>
                        </div>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-gray-500 rounded-box w-36 text-white">
                            <li><a href="/mahasiswa/create" >Data diri</a></li>
                            <li><a href="/user/{{ auth()->user()->id }}/edit" >Akun</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex-2 my-7 w-full h-[85%] py-3">
                @if (session()->get('success'))
                    <div role="alert" class="alert alert-success w-full max-w-xl self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ session()->get('success') }}</span>
                    </div>
                @endif
                @if ($errors->any())
                <div role="alert" class="alert alert-error w-full max-w-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ $errors->first() }}</span>
                </div>
                @endif
                @yield('container')
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
</html>
