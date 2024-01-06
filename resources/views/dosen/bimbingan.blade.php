@extends('layouts.dosen')

@section('container')
    <div class="w-full h-full" >
        <div class="w-[50%] h-fit flex gap-5" >
            @foreach ($room as $key => $item)
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                </div>
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $item->mahasiswa->user->avatar ? asset('/storage/' . $item->mahasiswa->user->avatar) : asset('img/user1.png') }}" alt="Bonnie image"/>
                    <h5 class="mb-1 text-md font-medium text-gray-900 dark:text-white">{{ $item->mahasiswa->nama }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $item->status }}</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="{{ route('roomDosen', ['room' => $item->id]) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Show</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
