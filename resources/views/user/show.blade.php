@extends('layouts.main')

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
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="username" value="{{ $mahasiswa->username }}" />
                </label>
                <label class="form-control w-full max-w-xl grow">
                    <div class="label">
                        <span class="label-text font-semibold text-lg">Email</span>
                    </div>
                    <input type="email" placeholder="Type here" class="input input-bordered w-full max-w-xl" name="email" value="{{ $mahasiswa->email }}" />
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
            <button class="btn btn-success w-full max-w-xl" >Save</button>
        </form>
    </div>
@endsection
