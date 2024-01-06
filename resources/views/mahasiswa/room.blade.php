@extends('layouts.main')

@section('container')
    <div class="w-full h-full flex flex-col gap-5 overflow-y-auto" >
        <label class="form-control w-full max-w-xl">
            <div class="label">
                <span class="label-text">Dosen Pembimbing</span>
            </div>
            <input type="text" class="input input-bordered w-full max-w-xl" value="{{ $room->dosen->nama }}" readonly />
        </label>
        <form action="{{ route('uploadDraft', ['room' => $room->id]) }}" class="w-full flex flex-col gap-5" enctype="multipart/form-data" method="post" >
            @csrf
            <label class="form-control w-full max-w-xl">
                <div class="label">
                    <span class="label-text">Upload draft proposal</span>
                </div>
                <input type="file" class="file-input file-input-bordered w-full max-w-xl" name="draft" />
            </label>
            <button class="w-[30%] btn btn-success" >Kirim</button>
        </form>
    </div>
@endsection
