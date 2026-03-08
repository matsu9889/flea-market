<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\AddressRequest;

class MyPageController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $listingItems = $user->listingItems()->get();
        $purchaseItems = $user->purchaseItems()->get();
        return view('mypage.show', compact('user', 'listingItems', 'purchaseItems'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('mypage.edit', compact('user'));
    }
    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->only([
            'user_name',
            'post_code',
            'address',
            'building',
        ]);
        // 画像がアップロードされたときだけ
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profile', 'public');
        }
        $user->update($data);
        return redirect('/mypage');
    }
    public function editAddress($item_id)
    {
        $user = Auth::user();
        $item = Item::findOrFail($item_id);
        return view('mypage.address', compact('user', 'item'));
    }
    public function updateAddress(AddressRequest $request, $item_id)
    {
        $data = $request->only([
            'post_code',
            'address',
            'building',
        ]);
        session()->put('post_code', $data['post_code']);
        session()->put('address', $data['address']);
        session()->put('building', $data['building']);
        return redirect('/purchase/' . $item_id);
    }
}
