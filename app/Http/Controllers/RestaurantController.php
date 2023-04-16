<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\UnixVisibility\PortableVisibilityConverter;

class RestaurantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:restaurant');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurantID = Auth::user()->id;
        $items = Item::where('restaurant_id', $restaurantID)->paginate(9);
        $orders = Order::where('restaurant_id', $restaurantID)->orderBy('created_at', 'desc')->paginate(3);

        return view('restaurant')->with(['items' => $items, 'orders' => $orders]);
    }

    public function addItem(ItemRequest $request)
    {
        $item = new Item;

        if ($request->hasFile('file')) {
            $request->file->store('items', 'public');
            $item->image = $request->file->hashName();
        }

        // dd($request);
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category = $request->category;
        $item->restaurant_id = Auth::user()->id;
        $item->save();

        return redirect()->route('restaurant.dashboard')->with(['msg' => 'Item Added!']);
    }

    public function deleteItem(Request $request)
    {
        $id = $request->item_id;
        $item = Item::find($id);
        if (File::exists(public_path('storage/items/' . $item->image))) {
            File::delete(public_path('storage/items/' . $item->image));
        }
        $item->delete();

        return redirect()->route('restaurant.dashboard')->with(['msg' => 'Item deleted']);
    }

    public function getItem(Request $request)
    {
        $item = Item::find($request->item_id);

        return response()->json([
            'item' => $item,
        ]);
    }

    public function editItem(ItemRequest $request)
    {
        $item = Item::find($request->item_id);
        if ($request->hasFile('file')) {
            if (Storage::disk('local')->exists('public/items/' . $item->image)) {
                Storage::delete('public/items/' . $item->image);
            }
            $request->file->store('items', 'public');
            $item->image = $request->file->hashName();
        }

        $item->name = $request->name;
        $item->price = $request->price;
        $item->category = $request->category;
        $item->restaurant_id = Auth::user()->id;
        $item->save();

        return redirect()->route('restaurant.dashboard')->with(['msg' => 'Item edited!']);
    }

    public function getItemsByPriceAsc()
    {
        $id = Auth::user()->id;
        $items = Item::where('restaurant_id', $id)->orderBy('price', 'asc')->paginate(9);

        return response()->json(['data' => $items]);
    }

    public function getItemsByPriceDesc()
    {
        $id = Auth::user()->id;
        $items = Item::where('restaurant_id', $id)->orderBy('price', 'desc')->paginate(9);

        return response()->json(['data' => $items]);
    }

    public function filterByName(Request $request)
    {
        $id = Auth::user()->id;
        $text = $request->searchValue;
        $items = Item::where('restaurant_id', $id)->where('name', 'like', '%' . $text . '%')->paginate(9);

        return response()->json(['data' => $items]);
    }
}
