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
        <button class="btn w-full max-w-xs bg-gray-400 text-black" onclick="my_modal_3.showModal()">Revisi >></button>
        <dialog id="my_modal_3" class="modal">
            <div class="modal-box w-11/12 max-w-6xl">
                <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="font-bold text-lg">Revisi</h3>
                <div>
                    <ul class="timeline timeline-snap-icon max-md:timeline-compact timeline-vertical">
                        @foreach ($room->revisi as $key => $item)
                            <li>
                                <hr/>
                                <div class="timeline-middle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" /></svg>
                                </div>
                                <div class="@if (($key + 1) % 2 === 0)
                                    timeline-end
                                @else
                                    timeline-start
                                    md:text-end
                                @endif mb-10">
                                    <time class="font-mono italic">{{ $item->tanggal_revisi }}</time>
                                    <div class="text-lg font-black">{{ 'Revisi ' . $key + 1 }}</div>
                                    {{ $item->revisi }}
                                </div>
                                <hr/>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </dialog>
    </div>
@endsection
