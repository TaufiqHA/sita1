@extends('layouts.kajur')

@section('container')
    <div class="w-full h-full overflow-y-auto" >
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Dosen Pembimbing 1
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dosen Pembimbing 2
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama }}
                                <a href="#" onclick="my_modal_3{{ $item->id }}.showModal()"> ({{ $item->mahasiswa()->count() }})</a>
                                <dialog id="my_modal_3{{ $item->id }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg">Mahasiswa bimbingan</h3>
                                    <ul class="menu bg-base-200 w-56 rounded-box mt-5">
                                        @foreach ($item->mahasiswa()->get() as $mhs)
                                            <li><a>{{ $mhs->nama }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                </dialog>
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama }} <a href="#">
                                    <a href="#" onclick="my_modal_1{{ $item->id }}.showModal()"> ({{ $item->mahasiswa()->count() }})</a>
                                <dialog id="my_modal_1{{ $item->id }}" class="modal">
                                <div class="modal-box">
                                    <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <h3 class="font-bold text-lg">Mahasiswa bimbingan</h3>
                                    <ul class="menu bg-base-200 w-56 rounded-box mt-5">
                                        @foreach ($item->mahasiswa2()->get() as $mhs)
                                            <li><a>{{ $mhs->nama }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                </dialog>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
