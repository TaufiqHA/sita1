@extends('layouts.main')

@section('container')
    <div class="w-full h-full" >
        <div class="w-[50%] h-fit flex gap-5" >
            @foreach ($room as $key => $item)
                <a href="{{ route('room', ['room' => $item->id]) }}" class="card w-full bg-neutral text-neutral-content grow">
                    <div class="card-body items-center text-center">
                        <h2 class="card-title">Pembimbing {{ $key + 1 }}</h2>
                        <p>We are using cookies for no reason.</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
