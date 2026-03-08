<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Purchase;


use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    public function create($item_id)
    {
        $item = Item::with(['purchase'])
            ->findOrFail($item_id);

        return view('items.purchase', compact('item'));
    }

    public function store(PurchaseRequest $request, $item_id)
    {
        Purchase::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id,
            'payment_method' => $request->payment_method,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        return redirect('/');
    }
}
