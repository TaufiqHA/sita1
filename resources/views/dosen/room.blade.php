@extends('layouts.dosen')

@section('container')
    <div class="w-full h-full flex flex-col gap-4 overflow-y-auto" >
        <label class="form-control w-full max-w-xl">
            <div class="label">
                <span class="label-text">Nama Mahasiswa</span>
            </div>
            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $room->mahasiswa->nama }}" readonly />
        </label>
        <label class="form-control w-full max-w-xl">
            <div class="label">
                <span class="label-text">NIM</span>
            </div>
            <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xl" value="{{ $room->mahasiswa->nim }}" readonly />
        </label>
        <label class="form-control w-full max-w-xl">
            <div class="label">
                <span class="label-text">Draft Proposal</span>
            </div>
            <a href="{{ route('downloadDraft', ['room' => $room->id]) }}" class="link ms-1">Downlaod</a>
        </label>
        <label class="form-control w-full max-w-xl">
            <div class="label">
                <span class="label-text">Revisi</span>
            </div>
            @if ($room->status === null)
                <form action="{{ route('revisiRoom', ['room' => $room->id]) }}" method="post" >
                    @csrf
                    @method('put')
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                    <input type="hidden" name="tanggal_revisi" value="{{ now() }}">
                    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." name="revisi" required></textarea>
                        </div>
                        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                            <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                Post comment
                            </button>
                            <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                                <button type="button" class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 20">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6"/>
                                    </svg>
                                    <span class="sr-only">Attach file</span>
                                </button>
                                <button type="button" class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z"/>
                                    </svg>
                                    <span class="sr-only">Upload image</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </label>
        <form action="{{ route('statusRoom', ['room' => $room->id]) }}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="status" value="Diterima" >
            <input type="hidden" name="tanggal_persetujuan" value="{{ now() }}">
            <button class="btn btn-success w-full max-w-md">Terima</button>
        </form>
        <button class="btn w-full max-w-sm bg-gray-400 text-black" onclick="my_modal_3.showModal()">Revisi >></button>
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
