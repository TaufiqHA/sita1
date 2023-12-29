<!DOCTYPE html>
<html lang="en" data-theme="light" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | Login</title>
</head>
<body>
    <div class="w-full h-screen flex flex-col justify-center items-center gap-5 bg-gradient-to-r from-gray-300 via-gray-400 to-gray-500">
        @if ($errors->any())
        <div role="alert" class="alert alert-error w-[30%]">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ $errors->first() }}</span>
        </div>
        @endif
        @if (session()->get('error'))
        <div role="alert" class="alert alert-error w-[30%]">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session()->get('error') }}</span>
        </div>
        @endif
        <div class="w-[30%] h-[70%] rounded-2xl shadow-2xl  bg-white/30 backdrop-blur ">
            <div class="w-full h-full flex flex-col items-center gap-5 px-8">
                <h2 class="font-semibold text-3xl my-6" >Login</h2>
                <form action="/" class="w-full h-full flex flex-col items-center gap-5" method="post">
                    @csrf
                    <input type="text" placeholder="username" class="input input-bordered w-full max-w-lg" name="username" autocomplete="off" />
                    <input type="password" placeholder="password" class="input input-bordered w-full max-w-lg" name="password" autocomplete="off" />
                    <a href="" class="self-end" >forgot password ?</a>
                    <button type="submit" class="btn btn-success w-full text-lg my-5 text-white" >Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
