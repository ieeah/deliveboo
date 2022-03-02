@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="heading">
			<h1>ciao{{$user->name}}</h1>
			<span>P.iva: {{$user->vat_number}}</span>
			<span class="ml-3">Indirizzo {{$user->address}}</span>
			
		</div>
		@if (session('error'))
			<div class="alert alert-danger my-5">
				<strong>{{session('error')}}</strong>
			</div>
			@elseif (session('success'))
			<div class="alert alert-success my-5">
				<strong>{{session('success')}}</strong>
			</div>
		@endif
		<form action="/restaurants/profile" class="form" method="POST" enctype="multipart/form-data">
			@csrf
			<h2 class="@if (!session('error')) mt-5 @endif mb-4">Modifica i dati relativi al tuo ristorante</h2>
			{{-- thumb --}}
			<div class="mb-4">
				<label for="thumb">Modifica l'immagine di copertina</label>
				@if ($user->thumb)
				<figure class="mb-3">
					<img width="700" src="{{asset('storage/'. $user->thumb)}}" alt="{{$user->name}}">
				</figure>
				@endif
				<input class="form-control-file" type="file" name="thumb" id="thumb" accept="image/png, image/jpeg">
				<div class="text-danger mb-4">solo file jpg/png. Massimo 2MB</div>
				@error('thumb')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>
			{{-- address --}}
			<div class="mb-4">
				<label for="address">Modifica indirizzo</label>
				<input class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{old('address')}}">
				@error('address')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>
			{{-- gestione tipologia --}}
			<div class="mb-4">
				<h5>Tipologie</h5>
				@foreach ($types as $type)
					<span class="d-inline-block mr-3">
						<input type="checkbox" name="types[]" id="type{{$type->id}}" value="{{$type->id}}"
							{{-- va bene per il create ma per l'edit va messo così come sotto --}}
							@if ($errors->any() && in_array($type->id, old('types')))
								checked
							@elseif (! $errors->any() && $user->types->contains($type->id))
								checked
							@endif
						>
						<label for="type{{$type->id}}">
							{{$type->name}}
						</label>
					</span>
				@endforeach
				@error('types')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>
			
			{{-- nuova password --}}
			<div class="mb-4">
				<label for="password">Modifica Password</label>
				<input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" value="">
				@error('password')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>
			{{-- conferma vecchia password --}}
			<div class="mb-4">
				<label for="old_password" class="text-danger">Per confermare le modifiche inserisci la tua attuale password</label>
				<input class="form-control @error('old_password') is-invalid @enderror" type="password" name="old_password" id="old_password">
				@error('old_password')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>
			<input class="btn btn-success" type="submit" value="Salva Modifiche">
			<a class="ml-3" href="/restaurants/dashboard">Torna alla Dashboard</a>
		</form>

		{{--TODO - eliminazione account qui serve un'altra form--}}
	</div>
@endsection