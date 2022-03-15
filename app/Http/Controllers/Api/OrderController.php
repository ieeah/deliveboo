<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        // prendiamo i dati
        $order = $request->all();

        // creiamo un nuovo ordine
        $new_order = new Order();

        // associamo i dati
        $new_order->customer_name = $order['name'];
        $new_order->customer_surname = $order['lastName'];
        $new_order->customer_address = $order['address'];
        $new_order->customer_email = $order['email'];
        $new_order->customer_phone = $order['phone'];
        $new_order->total_price = $order['tot'];
        $new_order->user_id = $order['user_id'];
        $plates = $order['plates'];


        // prendiamo la mail del ristorante
        $restaurant = User::where('id', $order['user_id'])->first();
        $email_restaurant = $restaurant->email;




        
        
        // //salviamo l'ordine a DB
        $new_order->save();
        
        
        // salvare la relazione tra piatti e ordini nella tabella order_plates
        $plates_decode = json_decode(json_decode($plates));
        foreach($plates_decode as $plate) {
            $new_order->plates()->attach([$plate->id => [
                'quantity' => $plate->quantity,
                'created_at' => $new_order->created_at
            ]]);

        };
        
        // inviamo le email
        Mail::to($new_order->customer_email)->send(new MailGuest($new_order->customer_name, $new_order->customer_address, $new_order->total_price, $restaurant->name, $plates_decode));
        Mail::to($email_restaurant)->send(new MailRestaurant($order['name'], $order['lastName'], $order['address'], $order['tot'], $order['phone'], $order['email'], $restaurant->name, $plates_decode));

        return response()->json($plates_decode);
    }

    public function serverValidation(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:255',
            'lastname' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:10,12',
            'address' => 'required|min:8|max:255'
        ],[
                'required' => 'Non lasciare vuoto il campo',
                'min' => 'Minimo :min caratteri',
                'max' => 'Maximo :max caratteri',
                'email' => 'Non è stata inserita una mail corretta',
                'numeric' => 'Il valore inserito non è un numero',
                'digits_between' => 'Il numero di telefono può avere tra le 10 e 12 cifre',
            ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        return response()->json();


        
    }
}
