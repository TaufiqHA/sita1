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
            <form action="{{ route('revisiRoom', ['room' => $room->id]) }}" method="post" >
                @csrf
                @method('put')
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white dark:bg-gray-800 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>
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
        </label>
        <form action="{{ route('statusRoom', ['room' => $room->id]) }}" method="post">
            @csrf
            @method('put')
            <button class="btn btn-success w-full max-w-md">Terima</button>
        </form>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Favorite Color</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>Quality Control Specialist</td>
                        <td>Blue</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Hart Hagerty</td>
                        <td>Desktop Support Technician</td>
                        <td>Purple</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Brice Swyre</td>
                        <td>Tax Accountant</td>
                        <td>Red</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
