<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'max: 255'],
            'phone' => ['nullable', 'max: 15']
        ], ['max' => 'Максимальная длина :attribute - :max']);
        if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $item = Item::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'key' => str_random(25)
        ]);
        return redirect()->action('Api\V1\ItemController@show', ['id' => $item->id]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'max: 255'],
            'phone' => ['nullable', 'max: 15']
        ], ['max' => 'Максимальная длина :attribute - :max']);
        if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        Item::find($request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'updated_at' => now()
        ]);
        return redirect()->action('Api\V1\ItemController@show', ['id' => $request->id]);
    }
    public function delete(int $id)
    {
        Item::destroy($id);
        return redirect()->action('Api\V1\ItemController@index');
    }
}
