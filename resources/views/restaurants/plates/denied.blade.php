@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Purtroppo non hai accesso a questa risorsa :(</h2>
		<div class="mb-2">
			<a href="{{route('restaurants.plates.index')}}" class="btn btn-success">Vai ai tuoi piatti</a>
		</div>
		<div class="mb-2">
			<a href="/restaurants/dashboard" class="btn btn-warning">Vai alla tua Dashboard</a>
		</div>
		
	</div>
@endsection