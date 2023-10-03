<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        return view('create');
    }
    public function update(int $id)
    {
        $item = Item::find($id);
        return view('update', ['item' => $item]);
    }
}
