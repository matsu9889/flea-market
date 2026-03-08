<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;


use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function create($item_id)
    {
        $item = Item::with(['purchase'])
            ->findOrFail($item_id);

        return view('items.purchase', compact('item'));
    }

    public function store(Request $request, $item_id)
    {
        Purchase::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id,
            'payment_method' => $request->payment,
            'post_code' => session()->get('post_code'),
            'address' => session()->get('address'),
            'building' => session()->get('building')
        ]);

        return redirect('/');
    }
}
