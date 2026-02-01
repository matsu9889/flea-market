<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function show(){
        return view('mypage.show');
    }

    public function update()
    {
        return view('mypage.edit');
    }
}
