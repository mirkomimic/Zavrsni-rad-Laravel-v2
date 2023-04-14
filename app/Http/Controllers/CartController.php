<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Item $item)
    {
        $cartItems = session()->get('cartItems', []);
        // $qty = session()->get('qty', 0);

        if (isset($cartItems[$item->id])) {
            $cartItems[$item->id]['quantity']++;
            // $qty = session()->increment('qty');
        } else {
            // $qty = session()->increment('qty');
            $cartItems[$item->id] = [
                "image" => $item->image,
                "name" => $item->name,
                "price" => $item->price,
                "quantity" => 1
            ];
        }
        session()->put('cartItems', $cartItems);
        // session()->put('qty', $qty);
        return redirect()->back();
    }

    public function removeFromCart(Item $item)
    {
        $cartItems = session()->get('cartItems');

        if (isset($cartItems[$item->id])) {
            if ($cartItems[$item->id]['quantity'] > 1) {
                $cartItems[$item->id]['quantity']--;
            } else {
                unset($cartItems[$item->id]);
            }
        }
        session()->put('cartItems', $cartItems);
        return redirect()->back();
    }
}
