<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function show(Request $request)
    {
        $profile = $request->only(['img', 'user_name']);
        return view('mypage.show');
    }

    public function edit()
    {
        return view('mypage.edit');
    }

    public function update(Request $request)
    {
        $profile = $request->only(['user_name', 'post_code', 'address', 'building']);
        return view('mypage.show', compact('profile'));
    }
}
