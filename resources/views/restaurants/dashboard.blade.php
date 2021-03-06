@extends('layouts.app')

@section('content')









<div class="dashboard container mt-3">
    <div class="info mb-5">
        <div class="name">
            <h3>Ciao {{Auth::user()->name}}</h3>
            <p class="font-weight-bold">Benvenuto nella tua Dashboard</p>
        </div>
        <div class="date">
           <p class="mr-2">{{$today}}</p> <i class="fa-solid fa-calendar-days"></i></p>

        </div>
    </div>
        <div class="general-data col-12 row">
            <div class="data-item col-sm-12 col-md-6 col-lg-3">
                <h4 class="text-primary mb-3">Ordini Ricevuti</h4>
                <h3 class="mb-3">{{ count($orders) }}</h3>
                <a href="/restaurants/orders"><button class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Mostra
                        Lista Ordini</button></a>
            </div>
            <div class="data-item col-sm-12 col-md-6 col-lg-3">
                <h4 class="text-primary mb-3">Numero dei tuoi Piatti</h4>
                <h3 class="mb-3">{{ count($plates) }}</h3>
                <a href="{{ route('restaurants.plates.index') }}"><button class="btn btn-primary"><i
                            class="fa-solid fa-circle-info"></i> Mostra i tuoi Piatti</button></a>
            </div>
            <div class="data-item col-sm-12 col-md-6 col-lg-3">
                <h4 class="text-primary mb-3">Data Ultimo Ordine</h4>

                @if ($last_order === null) 
                    <h5>Non ci sono Ordini</h5>
                @else
                <h3>{{ $last_order->created_at->format('d M Y') }}</h3>
                @endif


                <h3 class="mb-3"></h3>
{{--                 <a href=""><button class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Mostra Ultimo Ordine</button></a>
 --}}        </div>
        <div class="data-item col-sm-12 col-md-6 col-lg-3">
            <h4 class="text-primary mb-3">Guadagno Ultimo Ordine</h4>

            @if ($last_order === null) 
                    <h5>0 €</h5>
            @else
            <h3>{{$last_order->total_price}} €</h3>
            @endif

        </div>
        
    </div>
    <a class="btn btn-primary mt-5" href="/restaurants/profile">Modifica dettagli ristorante</a>
@endsection
