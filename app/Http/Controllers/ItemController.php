<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {

        $items = Item::orderBy('created_at', 'DESC')->get();

        foreach ($items as $item) {
            $item->formatted_created_at = Carbon::parse($item->created_at)->format('Y-m-d H:i');
        }

        return response()->json(['items' => $items]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $newItem = Item::create($data);
        return response()->json(['message' => 'Item added successfully'], 200);

    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $existing_item = Item::find($id);
        if ($existing_item) {
            $existing_item->completed = true;
            $existing_item->completed_at =  Carbon::now();
            $existing_item->save();
            return $existing_item;
        }
        return 'item not found!';
    }

    public function updateOLD(Request $request, string $id)
    {
        $existing_item = Item::find($id);
        if ($existing_item) {
            $existing_item->completed = $request->item['completed'] ? true : false;
            $existing_item->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $existing_item->save();
            return $existing_item;
        }
        return 'item not found!';
    }

    public function destroy($id)
    {

        $existing_item = Item::find($id);
        if ($existing_item) {
            $existing_item->delete();
            return 'Item deleted';
        }
        return 'Item not found';
    }
}
