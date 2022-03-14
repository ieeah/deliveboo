
{{--     # {{$restaurant_name}} Hai Ricevuto un nuovo Ordine!

    **Nome cliente:** {{$name}}
    **Cognome:** {{$surname}}
    **Indirizzo:** {{$address}}
    **Telefono:** {{$phone}}
    **Mail:** {{$mail}}
    
    ## Totale Ordine: **{{$total}}**

 --}}

<div class="message">
    <h1>{{$restaurant_name}} hai ricevuto un nuovo Ordine!</h1>
    <hr>
    <h3>Dati Cliente:</h3>
    <ul>
        <li>
            <b>Nome:</b> {{$name}}
        </li>
        <li>
            <b>Cognome:</b> {{$surname}}
        </li>
        <li>
            <b>Indirizzo:</b> {{$address}}
        </li>
        <li>
            <b>Telefono:</b> {{$phone}}
        </li>
        <li>
            <b>Mail:</b> {{$mail}}
        </li>
    </ul>

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