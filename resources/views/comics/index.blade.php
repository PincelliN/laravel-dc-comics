@extends('layouts.main')


@section('content')
    @if (session('delete'))
        <div class="alert alert-success m-1" role="alert">{{ session('delete') }}</div>
    @endif


    <h1>Fumetti</h1>
    <table class="table mx-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Thumb</th>
                <th scope="col">Price</th>
                <th scope="col">Data di Uscita</th>
                <th scope="col">Dettaglio</th>
                <th scope="col">Modifica</th>
                <th scope="col">Cancella</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($comics as $comic)
                <tr>

                    <td>{{ $comic->id }}</td>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->slug }}</td>
                    <td><img class='cover' src="{{ $comic->thumb }}" alt="{{ $comic->title }}"></td>
                    <td>{{ $comic->price }}</td>
                    <td>{{ $comic->sale_date }}</td>
                    <td><a class='btn btn-warning' href="{{ route('comics.show', $comic) }} "><i
                                class="fa-brands fa-readme"></i></a></td>
                    <td> <a class='btn btn-warning' href="{{ route('comics.edit', $comic) }}">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('comics.destroy', $comic) }}" method="post"
                            onsubmit="return confirm('sei sicuro di voler cancellare{{ $comic->title }}')">
                            @csrf

                            @method('Delete')
                            <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>

                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
