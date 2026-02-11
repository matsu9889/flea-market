<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = $request->only(['item_name', 'img_url', 'purchased_flag']);
        return view('items/index', compact('items'));
    }
}
