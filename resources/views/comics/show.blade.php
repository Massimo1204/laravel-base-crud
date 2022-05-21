@extends('layouts.main')

@section('main-content')
    <div class="title-wrapper">
        <h1 class="text-center mt-4">
            Comics
        </h1>
    </div>
    <div class="my-comic-wrapper d-flex my-4 mx-auto justify-content-center">
                <img class="my-comic-img m-4" src="{{ $comic->thumb }}" alt="comic image cap">
                <div class="my-comic-body m-4">
                    <h5 class="comic-title fw-bold">{{ $comic->title }}</h5>
                    <p class="comic-text"><span class="fw-bold">Description</span> : {{ $comic->description }}</p>
                    <p class="comic-text"><span class="fw-bold">Type</span>: {{ $comic->type }}</p>
                    <p class="comic-text"><span class="fw-bold">Series</span>: {{ $comic->series }}</p>
                    <p class="comic-text"><span class="fw-bold">Price</span>: {{ $comic->price }}$</p>

                    {{-- <a href="{{ route('comics.index')}}" class="btn btn-primary">View Details</a> --}}
                </div>
    </div>
@endsection