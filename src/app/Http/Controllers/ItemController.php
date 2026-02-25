<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // 商品一覧
    public function index(Request $request)
    {
        $keyword = $request->input('keyword', '');

        $query = Item::with(['purchase', 'listing']); //withの意味

        //商品一覧取得
        if (auth()->check()) {
            $query->where(function ($q) {
                $q->whereDoesntHave('listing')
                    ->orWhereHas('listing', function ($q) {
                        $q->where('user_id', '!=', auth()->id());
                    });
            });
        }

        // 検索
        if ($keyword) {
            $query->where('item_name', 'LIKE', "%{$keyword}%");
        }

        $items = $query->get();

        // マイリスト取得
        $mylistItems = collect(); //空にしている。必要かどうか
        if (auth()->check()) {
            $mylistItems = Item::with(['purchase', 'listing'])
                ->whereHas('favorites', function ($q) {
                    $q->where('user_id', auth()->id());
                })
                ->get();
        }

        return view('items.index', compact('items', 'mylistItems', 'keyword'));
    }

    // 商品詳細
    public function show($item_id)
    {
        $item = Item::with(['purchase', 'listing'])
            ->findOrFail($item_id);

        return view('items.show', compact('item'));
    }

    //商品出品画面表示
    public function create(Request $request)
    {
        return view('items.create');
    }

    //商品出品
    public function store(Request $request)
    {
        $data = $request->only([
            'item_name',
            'price',
            'brand_name',
            'description',
            'img_url',
            'category',
            'condition',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile', 'public');
        }

        return view('items.create');
    }
}
