@extends('layouts.app') 

@section('content')
<section class="order container mt-3">
        <h1 class="text-primary">I Tuoi Ordini</h1>
        <p>Qui puoi vedere tutti i tuoi ordini.</p>

        <a href="{{route('restaurants.statistic')}}"><button class="btn btn-primary mb-3">Visualizza le Statistiche</button></a>
        <a href="{{route('restaurants.dashboard')}}"><button class="btn btn-secondary mb-3">Torna alla Dashboard</button></a>

        <div class="table-responsive-sm">
            <table class="table table-striped">
                <thead>
                  <tr class="bg-primary text-light">
                    <th scope="col">N°</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->customer_name}}</td>
                        <td>{{$order->customer_surname}}</td>
                        <td>{{$order->customer_address}}</td>
                        <td>{{$order->customer_email}}</td>
                        <td>{{$order->customer_phone}}</td>
                        <td>€ {{$order->total_price}}</td>
                    </tr>
            
                    @endforeach
                </tbody>
              </table>
        </div>

</section>
    
    
@endsection