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
        if (!empty(session('cartItems'))) {

            $this->validate($request, [
                'restaurant_id' => 'required|numeric',
                'delivery_location' => 'required|string'
            ]);

            $locationOption = $request->delivery_location;
            $location = $locationOption == "address" ? "address" : $locationOption;

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'restaurant_id' => $request->restaurant_id,
                'grand_total' => 0,
                'delivery_location' => $location
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
        } else {
            return redirect()->back()->with(['msg' => 'You do not have items in cart']);
        }
    }
}
