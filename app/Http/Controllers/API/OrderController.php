<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){

        \request()->validate([
            'order_type'    => 'required',
            'order_details' => 'required',
        ]);

        $orderDetails = json_decode($request->input('order_details'),true);
        $order_type = $request->input('order_type');

        $order = new Order();
        $order->order_type = $order_type;

        if($order_type == 'delivery') {
            $order->delivery_fees  = 5.0;
            $order->customer_phone = $request->input('customer_phone');
            $order->customer_name  = $request->input('customer_name');
        } elseif ($order_type == 'dine-in') {
            $order->table_number   = $request->input('table_number');
            $order->service_charge = 10.0;
            $order->waiter_name    = $request->input('waiter_name');
        }

        $order->save();

        foreach($orderDetails as $details) {
            $orderDetail          = new OrderDetails($details);
            $orderDetail['total'] = $orderDetail->menu_items->item_price * $details['quantity'];
            $order->orderDetails()->save($orderDetail);
        }


        $order['details'] = $order->orderDetails;
        return response()->json([
            'order' => $order
        ]);
    }

}
