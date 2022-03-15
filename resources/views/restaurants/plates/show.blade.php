@extends('layouts.app')
@section('content')
    <div class="container">
        @if($plate)
            <div class="card text-start">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            Dettagli
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h2 class="card-title">{{$plate->name}}</h2>
                    <h6 class='font-weight-bold'>Descrizione</h6>
                    <p class="card-text border border-primary rounded p-2">{{$plate->description}}</p>
                    <h6 class='font-weight-bold'>Ingredienti</h6>
                    <p class="card-text border border-warning rounded p-2">{{$plate->ingredients}}</p>
                    <h6 class='font-weight-bold'>Prezzo</h6>
                    <p class="card-text border border-success rounded p-2">{{$plate->price}}</p>
                    <div class='img-container md-3 mb-3'>
                        <img class='img-fluid' width="400" src="{{asset('storage/'. $plate->thumb)}}" alt="{{$plate->thumb}}">
                    </div>
                    <a href="{{route('restaurants.plates.edit', $plate->id)}}" class="btn btn-warning">Modifica</a>
                    <a href="{{route('restaurants.plates.index')}}" class="btn btn-success">Torna alla lista piatti</a>
                </div>
            </div>
        @else
            <div class="text-center alert alert-danger">
                Il tuo ristorante non ha nel menu il seguente piatto: 
                <strong>{{ explode( '/' , request()->path())[count(explode( '/' , request()->path())) - 1] }}</strong> 
            </div>
        @endif
        
    </div>
@endsection