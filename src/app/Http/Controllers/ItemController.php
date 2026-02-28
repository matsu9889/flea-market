<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Item;
use App\Models\Favorite;
use App\Models\Comment;

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
            ->withCount('favorites')
            ->withCount('comments')
            ->findOrFail($item_id);

        return view('items.show', compact('item'));
    }

    //いいね機能
    public function toggleFavorite($item_id)
    {
        $item = Item::findOrFail($item_id);

        if ($item->is_liked_by_auth_user()) {
            $item->favorites()->where('user_id', auth()->id())->delete();
        } else {
            Favorite::create([
                'user_id' => auth()->id(),
                'item_id' => $item_id,
            ]);
        }

        return redirect('/item/' . $item_id);
    }

    //コメント機能
    public function storeComment(CommentRequest $request, $item_id)
    {
        $item = Item::findOrFail($item_id);

        if (auth()->check()) {
            Comment::create([
                'user_id' => auth()->id(),
                'item_id' => $item_id,
                'content' => $request->content,
            ]);
        };

        return redirect('/item/' . $item_id);
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
