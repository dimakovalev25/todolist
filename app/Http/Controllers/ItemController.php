<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save();

        return $newItem;
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
        if($existing_item) {
            $existing_item->completed = $request->item['completed'] ? true : false;
            $existing_item->completed_at = $request->item['completed'] ? Carbon::now() : null;
            $existing_item->save();
            return $existing_item;
        }
        return 'item not found!';
    }

    public function destroy(string $id)
    {
      $existing_item = Item::find($id);
      if ($existing_item){
          $existing_item->delete();
          return 'Item deleted';
      }
      return 'Item not found';
    }
}
