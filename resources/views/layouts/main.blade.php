<!DOCTYPE html>
<html lang="en" data-theme=@if (auth()->user()->tema === 'light')
    "light"
@else
    "dark"
@endif >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | {{ $title }}</title>
</head>
<body>
    <div class="w-full h-screen flex overflow-hidden ">
        <div class="w-[15%] h-screen @if (auth()->user()->tema === 'light')
                bg-gray-300
                @else
                bg-gray-500
            @endif">
            <a href="/mahasiswa" class="my-7 w-full flex justify-center" >
                <img src="{{ asset('/img/logo_sita.png') }}" alt="logo sita" class="w-[60%]">
            </a>
            <div class="w-full h-[50%] flex flex-col items-center justify-center gap-3 px-5 mt-16 font-semibold">
                <a href="/mahasiswa" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center @if ($title === "Dashboard")
                p-5 rounded-lg bg-gray-300 text-black w-full text-center
                @endif">Dashboard</a>
                @if ($mahasiswa->nama === null)
                    <div class="tooltip" data-tip='mohon mengisi data diri'>
                        <h2 class="p-5 text-gray-600" >Judul</h2>
                    </div>
                @else
                    <a href="/judul/create" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center @if ($title === "Tugas Akhir")
                    p-5 rounded-lg bg-gray-300 text-black w-full text-center
                    @endif">Judul</a>
                @endif
                <a href="{{ route('bimbingan') }}" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center @if ($title === "Bimbingan")
                p-5 rounded-lg bg-gray-300 text-black w-full text-center
                @endif">Bimbingan</a>
                <a href="{{ route('mahasiswa.seminar') }}" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center @if ($title === "Pendaftaran")
                p-5 rounded-lg bg-gray-300 text-black w-full text-center
                @endif" >Seminar</a>
                <a href="/logout" class="p-5 hover:rounded-lg hover:bg-gray-300 hover:text-black hover:w-full hover:text-center " >Logout</a>
            </div>
        </div>
        <div class="flex-2 w-[85%] h-full p-8 flex-col">
            <div class="flex-1 w-full h-[15%] flex justify-between">
                <div class="flex flex-col gap-3 justify-center">
                    <h2 class="font-semibold text-3xl">{{ $title }}</h2>
                    @if ($title === "Dashboard")
                        <p class="font-semibold text-lg">Selamat Datang Taufiq</p>
                    @endif
                </div>
                <div class="flex gap-5 items-center" >
                    {{-- <label class="swap swap-rotate">
                        <!-- this hidden checkbox controls the state -->
                        <input type="checkbox" class="theme-controller" value="light" @if (auth()->user()->tema === 'light')
                            checked
                        @endif />

                        <!-- sun icon -->
                        <svg class="swap-on fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>

                        <!-- moon icon -->
                        <svg class="swap-off fill-current w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>

                    </label> --}}
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="avatar w-12">
                            <div class="w-24 rounded-full">
                                <img src="{{ $avatar ? asset('/storage/' . $avatar) : asset('img/user1.png') }}" />
                            </div>
                        </div>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-gray-500 rounded-box w-36 text-white">
                            <li><a href="/mahasiswa/{{ $mahasiswa->id }}" >Data diri</a></li>
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
                    <div role="alert" class="alert alert-error w-full max-w-xl self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif
                @yield('container')
            </div>
        </div>
    </div>
    @yield('modal')
    @yield('scripts')
</body>
</html>
