<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = config('orders');

        foreach ($orders as $order) {
            $new_order = new Order();
            $new_order->customer_name = $order['customer_name'];
            $new_order->customer_surname = $order['customer_surname'];
            $new_order->customer_address = $order['customer_address'];
            $new_order->customer_email = $order['customer_email'];
            $new_order->customer_phone = $order['customer_phone'];
            $new_order->total_price = $order['total_price'];
            $new_order->user_id = $order['user_id'];
            $new_order->save();
        };
    }
}
