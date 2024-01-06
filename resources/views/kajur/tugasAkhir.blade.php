@extends('layouts.kajur')

@section('container')
    <div class="w-full h-fit flex gap-5" >
        <a href="{{ url('/judul') }}" class="card w-96 bg-base-100 shadow-xl image-full grow hover:scale-105">
            <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
            <div class="card-body">
                <h2 class="card-title">List Judul</h2>
                <div class="card-actions justify-end">
            </div>
            </div>
        </a>
        <a href="" class="card w-96 bg-base-100 shadow-xl image-full grow hover:scale-105">
            <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
            <div class="card-body">
                <h2 class="card-title">Judul Diterima</h2>
                <div class="card-actions justify-end">
            </div>
            </div>
        </a>
        <a href="" class="card w-96 bg-base-100 shadow-xl image-full grow hover:scale-105">
            <figure><img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
            <div class="card-body">
                <h2 class="card-title">Judul Ditolak</h2>
                <div class="card-actions justify-end">
            </div>
            </div>
        </a>
    </div>
@endsection
