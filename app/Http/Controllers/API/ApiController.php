<?php

namespace App\Http\Controllers\API;
// namespace App\Http\Controllers\itemController;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use App\Item;

class ApiController extends Controller
{
	public function index()
	{
		$users = User::all();
		return response()->json($users, 200);
	}

	public function getItemDetails($id){

		$items = Item::find($id);
		return response()->json($items, 200);
           // return view('item_details',compact('items'));
	}

	public function postBid(Request $request,$id){

		$items=Item::find($id);

		if ($lastBid > $item->highestPrice) {
			$item->highestPrice = $lastBid;
		}
		$item->highestPrice ++;

        return response()->json($items, 200);

	}

}
