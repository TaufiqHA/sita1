<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | Login</title>
</head>
<body>
    <div class="container mx-auto flex justify-center">
        <form action="/" method="POST">
            @csrf
            <label class="form-control w-full max-w-lg">
                <div class="label">
                  <span class="label-text">username</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-lg" name="username" />
            </label>
            <label class="form-control w-full max-w-lg">
                <div class="label">
                  <span class="label-text">password</span>
                </div>
                <input type="password" placeholder="Type here" class="input input-bordered w-full max-w-lg" name="password" />
            </label>
            <button class="btn btn-success rounded-lg mt-3">Login</button>
        </form>
    </div>
</body>
</html>
