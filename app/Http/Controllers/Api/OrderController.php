<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Braintree\Gateway;

use App\Mail\MailGuest;
use App\Mail\MailRestaurant;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();

        return response()->json($orders);
    }

}


/* Mail::to('email@utente.it')->send(new MailGuest()) */
/* Mail::to('email@ristornate.it')->send(new MailRestaurant()) */
