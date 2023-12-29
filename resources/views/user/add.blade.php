@extends('layouts.admin')

@section('container')
    <div class="w-full h-full overflow-y-auto" >
        <form action="/user" method="POST" class="w-full h-full flex flex-col gap-5">
            @csrf
            <label class="form-control w-full max-w-xl">
                <div class="label">
                    <span class="label-text font-semibold text-lg">username</span>
                </div>
                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="username" />
            </label>
            <label class="form-control w-full max-w-xl">
                <div class="label">
                    <span class="label-text font-semibold text-lg">email</span>
                </div>
                <input type="email" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="email" />
            </label>
            <label class="form-control w-full max-w-xl">
                <div class="label">
                    <span class="label-text font-semibold text-lg">Role</span>
                </div>
                <select class="select select-bordered" name="role_id">
                    <option disabled selected>select</option>
                    @foreach ($role as $item)
                        <option value="{{ $item->id }}">{{ $item->role_name }}</option>
                    @endforeach
                </select>
            </label>
            <input type="hidden" name="password" value="matematika">
            <button class="btn btn-success w-full max-w-xl" type="submit">tambah</button>
        </form>
    </div>
@endsection
