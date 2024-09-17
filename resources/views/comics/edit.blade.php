@extends('layouts.main')

@section('content')
    <h2>Nuova Fumetto</h2>
    <form class="bg bg-white p-5" action="{{ route('comics.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $comic['title'] }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $comic['description'] }}</textarea>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic['thumb'] }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $comic['price'] }}">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="series" name="series" value="{{ $comic['series'] }}">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data d'uscita</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{ $comic['sale_date'] }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" value="{{ $comic['type'] }}">
        </div>
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-pencil"></i></button>
        <button class="btn btn-danger" type="reset"><i class="fa-solid fa-xmark"></i></button>
    </form>
@endsection

@section('titlePage')
    Modifica Fumetto
@endsection
