<header class="d-flex justify-content-around py-4 border-bottom border-primary">
    <div class="my-header-links-wrapper ">
        <a href="{{ route('comics.index') }}"><h1>Home</h1></a>
    </div>
    <div class="my-header-links-wrapper ">
        <a href="{{ route('comics.create') }}">
            <button class="btn btn-primary fs-3">
                Create
            </button>
        </a>
    </div>
</header>