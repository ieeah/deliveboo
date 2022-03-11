<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

use App\Order;
use App\Restaurant;
use App\Mail\MailGuest;
use App\Mail\MailRestaurant;
use Illuminate\Support\Facades\Mail;


class BrainTreeController extends Controller
{
    // nel momento in cui la pagina "checkout" del front end finisce di essere renderizzata, viene fatta una richiesta a questa API che restituisce un token, (il nonce) che viene poi utilizzato per effettuare il pagamento vero e proprio
    public function token(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => '6gdmp999hs3wdn3b',
            'publicKey' => 'ts99vngpwbdzkrn9',
            'privateKey' => 'd9dadc65f77c9b7328a9e54e924c5e3a',
        ]);

        $token = $gateway->clientToken()->generate();
        return response()->json(compact('token'));
    }

    // Dopo aver gestito il carrello, ed aver processato il totale, si invia una richiesta al server braintree che ci restituirà l'esito del pagamento.
    // il nonce, è il codice che riceviamo come risposta dai server braintree nella funzione precedente
    // alla fine di questa funzione riceviamo l'esito della transazione con il suo messaggio di successo/errore
    public function sale(Request $request)
    {
        $amount = $request->amount;
        $nonce = $request->nonce;
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => '6gdmp999hs3wdn3b',
            'publicKey' => 'ts99vngpwbdzkrn9',
            'privateKey' => 'd9dadc65f77c9b7328a9e54e924c5e3a',
        ]);
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        
        return response()->json($result);
    }
}
