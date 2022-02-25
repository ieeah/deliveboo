@extends('layouts.app')

@section('content')
<div class="container">
	<div class="heading">
		<h1>
			{{Auth::user()->name}}
		</h1>
		<h2>
			Gestisci il tuo menù
		</h2>
	</div>

	<div class="food">
		<table class="table">
			<thead>
				<tr>
					<td>ID</td>
					<td>Nome Piatto</td>
					<td>Disponibile</td>
					<td>Prezzo</td>
					<td colspan="3">Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($plates as $plate)
					<tr>
						<td>{{$plate->id}}</td>
						<td>{{$plate->name}}</td>
						<td>
							@if ($plate->visibility)
								<i class="fa-solid fa-circle-check text-success"></i>
							@else
								<i class="fa-solid fa-circle-xmark text-danger"></i>
							@endif
						</td>
						<td>{{$plate->price}}</td>
						{{-- <td>
							<a class="btn btn-primary" href="{{route('restaurants.plate.show', $plate->id)}}">DETTAGLI</a>
						</td>
						<td>
							<a class="btn btn-success" href="{{ route('restaurants.plate.edit', $plate->id) }}">MODIFICA</a>
						</td>
						<td>
							<form action="{{ route('restaurants.plate.destroy', $plate->id) }}" method="POST">
								@csrf @method('DELETE')
								<input class="fw-bold text-danger" type="submit" value="DELETE">
							</form>
						</td> --}}
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


</div>
@endsection