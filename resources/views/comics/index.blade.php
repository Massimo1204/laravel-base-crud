@extends('layouts.main')

@section('main-content')
    <div class="title-wrapper">
        <h1 class="text-center mt-4">
            Comics
        </h1>
    </div>
    <div class="my-card-wrapper d-flex flex-wrap m-4">
        @foreach ($comics as $comic)
            <div class="my-card card m-4 " style="width: 18rem;">
                <img class="my-card-img card-img-top" src="{{ $comic->thumb }}" alt="Card image cap">
                <div class="my-card-body card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                    <p class="card-text">Type: {{ $comic->type }}</p>
                    <p class="card-text">Series: {{ $comic->series }}</p>
                    <p class="card-text">Price: {{ $comic->price }}$</p>

                    <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection