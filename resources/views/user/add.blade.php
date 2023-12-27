<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SITA | Tambah User</title>
</head>
<body>
    <div class="container mx-auto flex justify-center">
        <form action="/user" method="POST">
            @csrf
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">username</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="username" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">email</span>
                </div>
                <input type="email" placeholder="Type here" class="input input-bordered w-full max-w-xs" name="email" />
            </label>
            <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Role</span>
                </div>
                <select class="select select-bordered" name="role_id">
                  <option disabled selected>select</option>
                  @foreach ($role as $item)
                    <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                  @endforeach
                </select>
            </label>
            <input type="hidden" name="password" value="matematika">
            <button class="btn btn-success" type="submit">tambah</button>
        </form>
    </div>
</body>
</html>
