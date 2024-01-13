@extends('layouts.admin')

@section('container')
<div class="w-full flex justify-between gap-5 items-center mb-5">
    <div class="dropdown">
        <div tabindex="0" role="button" class="btn m-1">Status</div>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
            <li><a id="diterima" >Diterima</a></li>
            <li><a id="ditolak" >Ditolak</a></li>
            <li><a id="diajukan" >Diajukan</a></li>
            <li><a id="semua" >Semua</a></li>
        </ul>
    </div>
    <div>
        <a href="#" class="link">Download</a>
    </div>
</div>
<div id="content" >
    <div class="w-full flex gap-5 flex-col">
        <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center" >
                                Nama
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Judul
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal Pengajuan
                                <a href="#" id="tanggalPengajuan"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Status
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($judul as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->mahasiswa->nama }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->judul }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->tanggal_pengajuan }}
                            </td>
                            <td class="px-6 py-4">
                                @if ($item->status === 'Diterima')
                                    <div class="btn btn-success" >
                                        {{ $item->status }}
                                    </div>
                                @elseif ($item->status === 'Ditolak')
                                    <div class="btn btn-error" >
                                        {{ $item->status }}
                                    </div>
                                @elseif ($item->status === 'Diajukan')
                                    <div class="btn btn-warning" >
                                        {{ $item->status }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const diterima = document.getElementById('diterima');
    const ditolak = document.getElementById('ditolak');
    const diajukan = document.getElementById('diajukan');
    const semua = document.getElementById('semua');
    const content = document.getElementById('content');
    const ajax = new XMLHttpRequest();
    diterima.addEventListener('click', function() {

        ajax.addEventListener('load', function() {
            content.innerHTML = ajax.responseText
        })

        ajax.open("get", "{{ route('diterima') }}", true)
        ajax.send()
    })

    ditolak.addEventListener('click', function() {

        ajax.addEventListener('load', function() {
            content.innerHTML = ajax.responseText
        })

        ajax.open("get", "{{ route('ditolak') }}", true)
        ajax.send()
    })

    diajukan.addEventListener('click', function() {

        ajax.addEventListener('load', function() {
            content.innerHTML = ajax.responseText
        })

        ajax.open("get", "{{ route('diajukan') }}", true)
        ajax.send()
    })

    semua.addEventListener('click', function() {

        ajax.addEventListener('load', function() {
            content.innerHTML = ajax.responseText
        })

        ajax.open("get", "{{ route('semua') }}", true)
        ajax.send()
    })
</script>
@endsection
