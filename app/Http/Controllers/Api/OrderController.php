<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Braintree\Gateway;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailGuest;
use App\Mail\MailRestaurant;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();

        return response()->json($orders);
    }

    public function store(Request $request) {
        //prendiamo i dati
        $order = $request->all();

        //creiamo un nuovo ordine
        $new_order = new Order();

        //associamo i dati
        $new_order->customer_name = $order['name'];
        $new_order->customer_surname = $order['lastName'];
        $new_order->customer_address = $order['address'];
        $new_order->customer_email = $order['email'];
        $new_order->customer_phone = $order['phone'];
        $new_order->total_price = $order['tot'];
        $new_order->user_id = $order['user_id'];

        //prendiamo la mail del ristorante
        // $restaurant = User::where('id', $order['user_id'])->first()->get();
        // $email_restaurant = $restaurant->email;

        //inviamo le email
        // Mail::to($new_order['email'])->send(new MailGuest());
        // Mail::to($email_restaurant)->send(new MailRestaurant());

        //salviamo l'ordine a DB
        $new_order->save();
        return response()->json('salvataggio a DB effettuato');
    }
}
