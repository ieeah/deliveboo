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

		<form action="{{route('restaurants.plates.store')}}"
			class="d-flex flex-column"
			method="POST" enctype="multipart/form-data">
			@csrf
			<div class="mb-4">
				<label for="name">Nome Piatto *</label>
				<input class="form-control" type="text" name="name" id="name" value="{{ old('title') }}" required minlength="2" maxlength="200">
				@error('name')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-4">
				<label for="description">Descrizione</label>
				<textarea class="form-control" type="text" name="description" id="description" maxlength="1000">{{ old('description') }}</textarea>
				@error('description')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-4">
				<label for="ingredients">Ingredienti *</label>
				<textarea class="form-control" type="text" name="ingredients" id="ingredients" required maxlength="1000">{{ old('ingredients') }}</textarea>
				@error('ingredients')
					<div class="text-danger fw-bold">{{ $message }}</div>
				@enderror
			</div>

			<div class="mb-4">
				<label for="price">Prezzo *</label>
				<input class="form-control" type="number" name="price" id="price" min="1" max="99.90" step="0.1" required>
			</div>

			<div class="mb-4">
				<label for="visibility" class="d-block">Disponibile</label>
				<input type="checkbox" name="visibility" id="visibility" checked>
			</div>

			<div class="mb-4">
				<label for="thumb">Cover Image</label>
				<p>solo file png/jpg</p>
				<input class="form-control-file" type="file" name="thumb" id="thumb" accept="image/png, image/jpeg">
				@error('thumb')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>

			<input type="submit" value="Salva nuovo piatto" class="mt-4 btn btn-success">
		</form>

		<div class="actions d-flex justify-content-end">
			<a class="btn btn-secondary mt-3" href="{{ route('restaurants.plates.index') }}">Annulla</a>
		</div>
	</div>
@endsection