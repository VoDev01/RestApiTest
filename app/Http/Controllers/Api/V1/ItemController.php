<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class ItemController extends Controller
{
    public function index()
    {
        return Item::paginate();
    }
    public function show(int $id)
    {
        return Item::find($id);
    }
    public function create(Request $request)
    {
        $item = Item::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'key' => str_random(25)
        ]);
        return $item;
    }
    public function update(Request $request)
    {
        $item = Item::find($request->id);
        $item->name = $request->name;
        $item->phone = $request->phone;
        $item->save();
        return redirect()->action('Api\V1\ItemController@show', ['id' => $item->id]);
    }
    public function delete(int $id)
    {
        Item::destroy($id);
        return redirect()->action('Api\V1\ItemController@index');
    }
}
