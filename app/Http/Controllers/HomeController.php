<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session()->put('cartItems', []);

        $id = Auth::user()->id;

        $orders = Order::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(3);

        $restaurants = Restaurant::paginate(9);
        return view('home')->with(['restaurants' => $restaurants, 'orders' => $orders]);
    }

    public function showRestaurantItems(Request $request)
    {
        $id = $request->id;
        $restaurant = Restaurant::find($id);
        $items = Item::where('restaurant_id', $id)->paginate(9);

        $cartItems = session()->get('cartItems', []);
        $cartQty = 0;
        foreach ($cartItems as $item) {
            $cartQty += $item['quantity'];
        }

        return view('restaurant-items')->with(['items' => $items, 'restaurant' => $restaurant, 'cartQty' => $cartQty]);
    }
}
