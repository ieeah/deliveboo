
<div class="message">
    <h1>Grazie per averci scelto {{$name}}</h1>
    <h2>Il tuo ordine è già in lavorazione</h2>
    <hr>
    <h3>Hai ordinato i seguenti piatti presso {{$restaurant_name}} per un totale di {{$total}} €</h3>
    <h3>Riepilogo Ordine:</h3>
    <ul>
        @foreach ($plates_decode as $plate) 
        <li>
            <b>Nome Piatto:</b> {{$plate->name}}; <br>
            <b>Quantità</b> {{$plate->quantity}}; <br>
            <b>Costo</b> {{$plate->price}}; <br>
        </li>
        <br>
        @endforeach
    </ul>
    
    <h3>Il Ristorante consegnerà il tuo ordine il prima possibile al tuo indirizzo {{$address}}</h3>
    
</div>


<style>
    body {
        font-family: sans-serif;
    }   
    .message h1 {
        color: rgb(255, 141, 92);
    }

    .message h3 {
        color: #1DB39E;
    }
    
   
</style>