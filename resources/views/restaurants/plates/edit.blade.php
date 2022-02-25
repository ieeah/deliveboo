@extends('layouts.app')

@section('content')
	<div class="container plates_create_page">
		<div class="heading">
			<h1>
				{{Auth::user()->name}}
			</h1>
			<h2>
				Aggiungi un nuovo piatto al menù
			</h2>
		</div>

		<form action="{{route('restaurants.plates.update', $plate->id)}}"
			class="d-flex flex-column"
			method="POST" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			
			<div class="mb-4">
				<label for="name">Nome Piatto</label>
				<input class="form-control" type="text" name="name" id="name" value="{{ old('title') }}">
				@error('name')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-4">
				<label for="description">Descrizione</label>
				<textarea class="form-control" type="text" name="description" id="description">{{ old('description') }}</textarea>
				@error('description')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-4">
				<label for="ingredients">Ingredienti</label>
				<textarea class="form-control" type="text" name="ingredients" id="ingredients">{{ old('ingredients') }}</textarea>
				@error('ingredients')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-4">
				<label for="price">Prezzo</label>
				<input class="form-control" type="number" name="price" id="price" min="0" step="0.1">
			</div>

			<div class="mb-4">
				<label for="visibility" class="d-block">Disponibile</label>
				<input type="checkbox" name="visibility" id="visibility" checked>
			</div>

			<div class="mb-4">
				<label for="thumb">Cover Image</label>
				<input class="form-control-file" type="file" name="thumb" id="thumb">
				@error('thumb')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>

			{{-- TODO - verificare se devo implementare altro e come nel controller per la gestione della foto --}}
			<input type="submit" value="Salva nuovo piatto" class="mt-4 btn btn-success">
		</form>

		<div class="actions d-flex justify-content-end">
			<a class="btn btn-secondary mt-3" href="{{ route('restaurants.plates.index') }}">Annulla</a>
		</div>
	</div>
@endsection