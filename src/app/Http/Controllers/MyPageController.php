<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function update()
    {
        return view('mypage.edit');
    }
}
