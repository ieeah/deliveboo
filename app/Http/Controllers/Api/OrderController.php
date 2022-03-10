<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Braintree\Gateway;


class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();

        return response()->json($orders);
    }

    public function store(Request $request) {
        /* TODO: Manca prendere i dati dell'ordine */
        //prendiamo i dati
        $order = $request->all();

        //creiamo un nuovo ordine
        $new_order = new Order();

        //associamo i dati
        $new_order->customer_name = $order->name;
        $new_order->customer_surname = $order->lastname;
        $new_order->customer_address = $order->address;
        $new_order->customer_email = $order->email;
        $new_order->customer_phone = $order->phone;
        $new_order->total_price = $order->tot;
        $new_order->user_id = 1; 

        //prendiamo la mail del ristorante
        $restaurant = Users::where('id', $order->user_id)->first()->get();
        $email_restaurant = $restaurant->email;

        //inviamo le email
        Mail::to($new_order->customer_address)->send(new MailGuest());
        Mail::to($email_restaurant)->send(new MailRestaurant());
        
        //salviamo l'ordine a DB
        $new_order->save();
    }

}
