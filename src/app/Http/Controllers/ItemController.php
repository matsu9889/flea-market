<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ExhibitionRequest;
use App\Models\Item;
use App\Models\Favorite;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Listing;


class ItemController extends Controller
{
    // 商品一覧
    public function index(Request $request)
    {
        $keyword = $request->input('keyword', '');

        $query = Item::with(['purchase', 'listing']);

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
        $mylistItems = collect();
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
        $item = Item::with(['purchase', 'listing', 'categories', 'comments.user'])
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

        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $item_id,
            'content' => $request->content,
        ]);

        return redirect('/item/' . $item_id);
    }


    //商品出品画面表示
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    //商品出品
    public function store(ExhibitionRequest $request)
    {
        $path = $request->file('img_url')->store('items', 'public');

        $item = Item::create([
            'item_name' => $request->item_name,
            'price' => $request->price,
            'brand_name' => $request->brand_name,
            'description' => $request->description,
            'img_url' => $path,
            'condition' => $request->condition,
        ]);

        $item->categories()->sync($request->categories);

        Listing::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
        ]);

        return redirect('/');
    }
}
