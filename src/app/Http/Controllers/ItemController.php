<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // 商品一覧
    public function index()
    {
        $items = Item::with(['purchase', 'listing'])
            ->whereHas('listing', function ($query) {
                $query->where('user_id', '!=', auth()->id());
            })
            ->get();
        return view('items.index', compact('items'));
    }

    // 商品詳細
    public function show($item_id)
    {
        $item = Item::with(['purchase', 'listing'])
            ->findOrFail($item_id);

        return view('items.show', compact('item'));
    }
}
