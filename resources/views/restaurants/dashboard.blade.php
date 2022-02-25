@extends('layouts.app')

@section('content')

<div class="dashboard container mt-3">
    <div class="info mb-5">
        <div class="name">
            <h3>Ciao {{Auth::user()->name}}</h3>
            <p class="font-weight-bold">Benvenuto nella tua Dashboard</p>
        </div>
        <div class="date">
           <p>Venerdì 25 Febbraio 2022 <i class="fa-solid fa-calendar-days"></i></p>
        </div>
    </div>



    <div class="general-data col-12">
        <div class="data-item col-3">
                <h4 class="text-primary mb-3">Ordini Ricevuti</h4>
                <h3 class="mb-3">31</h3>
                <a href=""><button class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Mostra Lista Ordini</button></a>
        </div>
        <div class="data-item col-3">
                <h4 class="text-primary mb-3">Numero dei tuoi Piatti</h4>
                <h3 class="mb-3">19</h3>
                <a href="{{route('restaurants.plates.index')}}"><button class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Mostra i tuoi Piatti</button></a>
        </div>
        <div class="data-item col-3">
                <h4 class="text-primary mb-3">Data Ultimo Ordine</h4>
                <h3 class="mb-3">25/02/1999</h3>
                <a href=""><button class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Mostra Ultimo Ordine</button></a>
        </div>
        <div class="data-item col-3">
            <h4 class="text-primary mb-3">Guadagno</h4>
            <h3>€ 1203,00</h3>
    </div>
    </div>
</div>
    
@endsection