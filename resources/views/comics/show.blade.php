@extends('layouts.main')

@section('main-content')
    <div class="title-wrapper">
        <h1 class="text-center mt-4 text-uppercase text-danger">
            Comic
        </h1>
    </div>
    @if (session('message'))
        <div class="alert alert-success mt-4 mx-4">
            {{ session('message') }}
        </div>
    @endif
    @if (session('created-message'))
        <div class="alert alert-success mt-4 mx-4">
            {{ session('created-message') }}
        </div>
    @endif
    <div class="my-comic-wrapper d-flex my-4 mx-auto justify-content-center">
                <img class="my-comic-img m-4" src="{{ $comic->thumb }}" alt="comic image cap">
                <div class="my-comic-body m-4">
                    <h5 class="comic-title fw-bold">{{ ucfirst($comic->title) }}</h5>
                    <p class="comic-text"><span class="fw-bold">Description</span> : {{ $comic->description }}</p>
                    <div class="my-comic-details-outer-wrapper">
                        <div class="my-comic-details-inner-wrapper">
                            <p class="my-comic-text"><span class="fw-bold">Type</span>: {{ $comic->type }}</p>
                            <p class="my-comic-text"><span class="fw-bold">Series</span>: {{ $comic->series }}</p>
                            <p class="my-comic-text"><span class="fw-bold">Price</span>: {{ $comic->price }}$</p>
                        </div>
                        <div class="my-comic-button-wrapper d-flex mt-5">
                            <a href="{{ route('comics.edit' , $comic) }}">
                                <button class="btn btn-warning fs-4 text-light px-4 text-uppercase fw-bold me-4">
                                    Edit
                                </button>
                            </a>

                            <form action="{{ route('comics.destroy', $comic)}}" method="POST">
                                @csrf
                                @method('DELETE')
    
                                <button type="submit" class="btn btn-danger fs-4 px-4 text-uppercase fw-bold">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- <a href="{{ route('comics.index')}}" class="btn btn-primary">View Details</a> --}}
                </div>
    </div>
@endsection