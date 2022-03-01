@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="heading">
			<h1>ciao{{Auth::user()->name}}</h1>
			<h2>Qui puoi modificare i dati relativi al tuo ristorante</h2>
		</div>

		<form action="{{route('restaurants.', Auth::user()->id)}}" class="form" method="POST" enctype="multipart/form-data">
			{{-- thumb --}}
			<div class="mb-4">
				<label for="thumb">Cover Image</label>
				@if ($user->thumb)
				<figure class="mb-3">
					<img width="300" src="{{asset('storage/'. $user->thumb)}}" alt="{{$user->name}}">
				</figure>
				@endif
				<input class="form-control-file" type="file" name="thumb" id="thumb" accept="image/png, image/jpeg">
				@error('thumb')
					<div class="text-danger">{{$message}}</div>
				@enderror
			</div>
			{{-- address --}}
			<div class="mb-4">
				<label for="thumb"></label>
				<input type="text" name="" id="">
			</div>
			{{-- gestione tipologia --}}
			<div class="mb-4">
				<label for="thumb"></label>
				<input type="text" name="" id="">
			</div>
			{{-- conferma vecchia password --}}
			<div class="mb-4">
				<label for="thumb"></label>
				<input type="text" name="" id="">
			</div>
			{{-- nuova password --}}
			<div class="mb-4">
				<label for="thumb"></label>
				<input type="text" name="" id="">
			</div>
			{{-- eliminazione account qui serve un'altra form--}}
			
		</form>
	</div>
@endsection