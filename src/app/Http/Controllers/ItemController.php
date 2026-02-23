<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // 商品一覧
    public function index()
    {
        $query = Item::with(['purchase', 'listing']);

        if (auth()->check()) {
            $query->whereHas('listing', function ($q) {
                $q->where('user_id', '!=', auth()->id());
            });
        }

        $items = $query->get();

        return view('items.index', compact('items'));
    }

    // 商品詳細
    public function show($item_id)
    {
        $item = Item::with(['purchase', 'listing'])
            ->findOrFail($item_id);

        return view('items.show', compact('item'));
    }

    public function store(Request $request){
        //$comment = $request->validate()
        //return view('items.show');
    }
}
