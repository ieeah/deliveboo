<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Braintree\Gateway;
// use App\Http\Requests\Orders\OrderRequest;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();

        return response()->json($orders);
    }

    //BRAINTREE TOKEN GENERATION
    public function generate(Request $request,Gateway $gateway){
        $token = $gateway->clientToken()->generate();

        $data = [
            // 'success' =>true,
            'token' => $token
        ];

       return response()->json($data,200);
    }

    //BRAINTREE TOKEN MAKE PAYMENT
    // public function makePayment(OrderRequest $request,Gateway $gateway){
    //     $order = Order::find($request->order);

    //     $result = $gateway->transaction()->sale([
    //         'amount' => $order->total_price,
    //         'paymentMethodNonce' => $request->token,
    //         'options' => [
    //             'submitForSettlement' => true
    //         ]
    //     ]);
    //     if ($result->success){
    //         $data = [
    //             'success' =>true,
    //             'message' => "transazione eseguita con successo"
    //         ];
    //         return response()->json($data,200);
    //     } else{
    //         $data = [
    //             'success' =>false,
    //             'message' => "transazione fallita"
    //         ];
    //         return response()->json($data,401);
    //     }
    // }
}
