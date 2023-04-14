<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'restaurant_id' => 'required|numeric'
        ]);

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'restaurant_id' => $request->restaurant_id,
            'grand_total' => 0
        ]);
        $grandTotal = 0;
        foreach (session('cartItems') as $id => $value) {
            $grandTotal += $value['price'] * $value['quantity'];
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $id,
                'quantity' => $value['quantity'],
                'total' => $value['price'] * $value['quantity']
            ]);
        }

        $order->grand_total = $grandTotal;
        $order->save();

        return redirect()->route('home')->with(['msg' => 'Order created']);
    }
}
