<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        return view('mypage.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('mypage.edit', compact('user'));
    }

    public function update(Request $request)
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
}
