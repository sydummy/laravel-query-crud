<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemsController extends Controller
{
    /**
     *  GET METHOD
     *  Show All Items
    */
    public function showItems()
    {
        $items = DB::table('items')->get();

        return  $items;
    }

    /**
       *  GET METHOD
       *  Show Single Item
      */
    public function showItem($id)
    {
        $item = DB::table('items')->where('id', strtolower($id))->get();

        return  $item;
    }

    /**
    *  GET METHOD
    *  Show Single Item By Name
      */
    public function showItemByName($name)
    {
        $item = DB::table('items')->where('name', strtolower($name))->get();
  
        return  $item;
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

        $item = DB::table('items')->insert(
            [
                'id' => str_random(22),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'owner' => $request->input('owner')
                ]
        );

        if ($item) {
            return response()->json([
            'message' => 'Item has been successfully added'
        ]);
        } else {
            return response()->json([
                'message' => $item
            ]);
        }
    }

    /**
    *  DELETE METHOD
    *  Delete Single Item
      */
    public function deleteItem($id)
    {
        $item = DB::table('items')->where('id', strtolower($id))->delete();
  
        if ($item) {
            return response()->json([
            'message' => 'Item has been successfully deleted'
        ]);
        } else {
            return response()->json([
                'message' => $item
            ]);
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

        $item = DB::table('items')->where('id', $request->input('id'))
        ->update(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'owner' => $request->input('owner')
                ]
        );
    
        if ($item) {
            return response()->json([
              'message' => 'Item has been successfully updated'
          ]);
        } else {
            return response()->json([
                  'message' => 'Nothing to update'
              ]);
        }
    }
}
