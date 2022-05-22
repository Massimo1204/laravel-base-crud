@extends('layouts.main')

@section('main-content')
    <div class="title-wrapper">
        <h1 class="text-center text-uppercase text-danger mt-4">
            Comics
        </h1>
    </div>
    @if (session('delete-message'))
        <div class="alert alert-warning mt-4 mx-4">
            {{ session('delete-message') }}
        </div>
    @endif
    <div class="my-card-wrapper d-flex flex-wrap m-4 justify-content-center">
        @foreach ($comics as $comic)
            <div class="my-card card m-4" style="width: 18rem;">
                <img class="my-card-img card-img-top" src="{{ $comic->thumb }}" alt="Card image cap">
                <div class="my-card-body card-body">
                    <h5 class="card-title">{{ $comic->title }}</h5>
                    <p class="card-text">Type: {{ $comic->type }}</p>
                    <p class="card-text">Series: {{ $comic->series }}</p>
                    <p class="card-text">Price: {{ $comic->price }}$</p>
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('comics.destroy', $comic)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>

                        <a href="{{ route('comics.edit' , $comic) }}">
                            <button class="btn btn-warning text-light">
                                Edit
                            </button>
                        </a>

                        <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection