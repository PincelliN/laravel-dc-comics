@extends('layouts.main')


@section('content')
    <div class="card m-5 p-2" style="width: 18rem;">
        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $comic->title }}</h5>
            <p class="card-text">{{ $comic->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Prezzo:{{ $comic->price }}</li>
            <li class="list-group-item">Serie:{{ $comic->series }}</li>
            <li class="list-group-item">Data di Uscita:{{ $comic->sale_date }}</li>
            <li class="list-group-item">{{ $comic->type }}</li>
        </ul>
        <div class="card-body">
            <a href="{{ route('comics.index') }}" class="card-link btn btn-danger" title="Home"><i
                    class="fa-solid fa-right-from-bracket"></i></a>
            <a class='btn btn-warning ' href="{{ route('comics.edit', $comic) }}" title="Modifica">
                <i class="fa-solid fa-pencil"></i>
            </a>
            <form class="d-inline" action="{{ route('comics.destroy', $comic) }}" method="post"
                onsubmit="return confirm('sei sicuro di voler cancellare{{ $comic->title }}')" title="Cancella">
                @csrf

                @method('Delete')
                <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>

            </form>

        </div>
    </div>
@endsection
@section('titlePage')
    {{ $comic->slug }}
@endsection
