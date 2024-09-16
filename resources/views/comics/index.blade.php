@extends('layouts.main')


@section('content')
    <h1>Fumwetti</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Titolo</th>
                <th scope="col">Slug</th>
                <th scope="col">Thumb</th>
                <th scope="col">Price</th>
                <th scope="col">Data di Uscita</th>
                <th scope="col">Dettaglio</th>

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
                    <td><a class='btn btn-warning' href="{{-- {{ route(comics . show) }} --}}"><i class="fa-brands fa-readme"></i></a></td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
