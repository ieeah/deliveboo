@extends('layouts.app')

@section('content')
    <div class="container plates_create_page">
        <div class="heading">
            <h1>
                {{ Auth::user()->name }}
            </h1>
            <h2>
                Modifica {{ $plate->name }}
            </h2>
        </div>

        <form action="{{ route('restaurants.plates.update', $plate->id) }}" class="d-flex flex-column" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            @endif

            <div class="mb-4">
                <label for="name">Nome Piatto *</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('title', $plate->name) }}"
                    {{-- required minlength="2" maxlength="200" --}}>
                @error('name')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description">Descrizione</label>
                <textarea class="form-control" type="text" name="description" id="description"
                    {{-- maxlength="1000" --}}>{{ old('description', $plate->description) }}</textarea>
                @error('description')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="ingredients">Ingredienti *</label>
                <textarea class="form-control" type="text" name="ingredients" id="ingredients"
                    {{-- maxlength="1000" required --}}>{{ old('ingredients', $plate->ingredients) }}</textarea>
                @error('ingredients')
                    <div class="text-danger fw-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price">Prezzo *</label>
                <input class="form-control" step="0.1" name="price" id="price" type="number" {{-- min="0" max="99.90" required --}}
                    value="{{ old('price', $plate->price) }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="visibility" class="d-block">Disponibile</label>
                <input type="checkbox" name="visibility" id="visibility" @if ($plate->visibility) checked @endif>
            </div>

            <div class="mb-4">
                <label for="thumb">Cover Image</label>
                @if ($plate->thumb)
                    <figure class="mb-3">
                        <img width="300" src="{{ asset('storage/' . $plate->thumb) }}" alt="{{ $plate->thumb }}">
                    </figure>
                @endif
                <input class="form-control-file" type="file" name="thumb" id="thumb"
                    accept="image/png, image/jpeg, image/jpg">
                @error('thumb')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- TODO - verificare se devo implementare altro e come nel controller per la gestione della foto --}}
            <input type="submit" value="Modifica piatto" class="mt-4 w-25 btn btn-success">
        </form>

        <div class="actions d-flex justify-content-end">
            <a class="btn btn-secondary mt-3" href="{{ route('restaurants.plates.index') }}">Annulla</a>
        </div>
    </div>
@endsection
