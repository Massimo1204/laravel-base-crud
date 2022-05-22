@extends('layouts.main')

@section('main-content')
    <h1 class="text-center text-danger mt-4">Create new Comic</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="my-form-wrapper">
        <form class="m-5" action="{{ route('comics.store')}}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label class="fs-4" for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group mb-3">
                <label class="fs-4" for="description">Description</label>
                <input type="description" class="form-control" id="description" name="description">
            </div>
            <div class="form-group mb-3">
                <label class="fs-4" for="thumb">Image Source</label>
                <input type="thumb" class="form-control" id="thumb" name="thumb">
            </div>
            <div class="form-group mb-3">
                <label class="fs-4" for="price">Price</label>
                <input type="number" step=0.01 class="form-control" id="price" name="price">
            </div>
            <div class="form-group mb-3">
                <label class="fs-4" for="series">Series</label>
                <input type="text" class="form-control" id="series" name="series">
            </div>
            <div class="form-group mb-3">
                <label class="fs-4" for="sale_date">Sale date</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date">
            </div>
            <div class="form-group mb-3">
                <label class="fs-4" for="type">Type</label>
                <input type="text" class="form-control" id="type" name="type">
            </div>
            <div class="my-form-button-wrapper clearfix">
                <button type="submit" class="btn btn-primary fs-4 float-end">Submit</button>
            </div>
        </form>
    </div>
@endsection