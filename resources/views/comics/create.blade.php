@extends('layouts.main')

@section('content')
    <h2>Nuova Fumetto</h2>
    <form class="bg bg-white p-5" action="{{ route('comics.store') }}" method="post">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Action Comics"
                value="{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="3" value="{{ old('description') }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Immagine</label>
            <input type="text" class="form-control" id="thumb" name="thumb"
                placeholder="https://www.coverbrowser.com/image/action-comics/1-1.jpg" value="{{ old('thumb') }}">
            @error('thumb')
                <div class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="$3.99"
                value="{{ old('price') }}">
            @error('price')
                <div class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Serie</label>
            <input type="text" class="form-control" id="series" name="series" placeholder="American Vampire 1976"
                value="{{ old('series') }}">
            @error('title')
                <div class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Data d'uscita</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" placeholder="2020-10-06"
                value="{{ old('sale_date') }}">
            @error('sale_date')
                <div class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipo</label>
            <input type="text" class="form-control" id="type" name="type" placeholder="comic book"
                value="{{ old('type') }}">
            @error('type')
                <div class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-file-import"></i></button>
        <button class="btn btn-danger" type="reset"><i class="fa-solid fa-xmark"></i></button>
    </form>
@endsection

@section('titlePage')
    Nuovo Fumetto
@endsection
