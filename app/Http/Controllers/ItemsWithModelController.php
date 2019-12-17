<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Items;

class ItemsWithModelController extends Controller
{
    /**
     *  GET METHOD
     *  Show All Items
    */
    public function showItems()
    {
        $items = Items::all();

        return  $items;
    }
    
    /**
      *  GET METHOD
      *  Show Single Item
     */
    public function showItem($id)
    {
        $item = Items::where('id', $id)->first();
        if ($item) {
            return $item;
        } else {
            return response()->json([
                'message' => 'Item not found',
            ]);
        }
    }


    /**
    *  GET METHOD
    *  Show Single Item By Name
      */
    public function showItemByName($name)
    {
        $item = Items::where('name', $name)->first();
        if ($item) {
            return $item;
        } else {
            return response()->json([
                'message' => 'Item not found',
            ]);
        }
    }


    /**
     *  POST METHOD
     *  Insert Items
    */
    public function insertItem(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'owner' => 'max:255',
            ]);

        try {
            $newItem = new Items;
            $newItem_id = str_random(12);
            $newItem->id = $newItem_id;
            $newItem->name = $request->input('name');
            $newItem->description = $request->input('description');
            $newItem->owner = $request->input('owner');
            if ($newItem->save()) {
                return response()->json([
                'message' => 'Item has been successfully added',
                'product' => $newItem
            ]);
            }
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                        'message' => 'Not found',
                ], 404);
        }
    }


    /**
    *  PUT METHOD
    *  Update Single Item
     */
    public function updateItem(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'owner' => 'max:255',
            ]);
        try {
            $item = Items::findOrFail($request->id);
            $item->name = $request->input('name');
            $item->description = $request->input('description');
            $item->owner = $request->input('owner');

            if ($item->save()) {
                return response()->json([
                'message' => 'Item has been successfully updated',
                'product' => $item
            ]);
            }
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                        'message' => 'Not found',
                ], 404);
        }
    }


    /**
       *  DELETE METHOD
       *  Delete Single Item
         */
    public function deleteItem($id)
    {
        try {
            $item = Items::findorfail($id);
            $item->delete();
            return response()->json([
                            'message' => 'Item has been successfully deleted',
                            'product' => $item
                        ]);
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                    'message' => 'Not found',
            ], 404);
        }
    }
}