<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function show(Request $request)
    {
        $profile = $request->only(['img', 'user_name']);
        return view('mypage.show');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('mypage.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        // 画像がアップロードされたときだけ
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile', 'public');
            $user->image = $path;
        }
        $profile = $request->only(['user_name', 'post_code', 'address', 'building']);
        return view('mypage.show', compact('profile'));
    }
}
