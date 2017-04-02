<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Auth;
use DB;
use Mail;

class itemController extends Controller {

    public function loadAddForm() {
        return view('addItemForm');
    }

    public function addItem(Request $request) {

        $this->Validate($request, [
            'name' => 'required|min:3|max:20',
            'description' => 'required|min:10|max:500',
            'price' => 'required'
        ]);
        if ($request->input('isOnline') == "on") {
            $isOnline = true;
        } else {
            $isOnline = false;
        }
        //  $item=$request->all();
        $newItem = new Item;
        $newItem->name = $request->input('name');
        $newItem->user_id = 1;
        $newItem->description = $request->input('description');
        $newItem->price = $request->input('price');
        $newItem->isOnline = $isOnline;
        $newItem->highestPrice = $newItem->price;
        $newItem->highestBidder = $newItem->user_id;
        $newItem->imagePath = $request->file('photo')->store('images/items');
        $newItem->save();
        //$newItem->back();
    }

    public function makeBid(Request $request, $id) {
        $item = Item::find($id);              // $item->user->email
        $owner = User::find($item->user_id);   // skip
        // dd($owner);

        $lastBid = $request->lastbid;
        //dd("item5".$item);
        //  $item->highestPrice=$request->input('lastbid');
        if ($lastBid > $item->highestPrice) {
            $item->highestPrice = $lastBid;
            $item->numberOfBids = $item->numberOfBids + 1;
            $item->save();
        }

        $data = [
            'name' => $owner->name,
        ];

        Mail::send('email.index', $data, function ($message) use ($item, $owner) {
            $message->from('eng.m.developer@gmail.com', 'MAZAD - New Bid On ' . $item->name);
            $message->sender('eng.m.developer@gmail.com', 'MAZAD - New Bid On ' . $item->name);
            $message->to($owner->email, $owner->name);
            $message->subject('MAZAD - New Bid On ' . $item->name);
            $message->priority(3);
        });
    }

    public function getItem($id) {

        $newItem = Item::find($id);


        return response()->json(['item' => $newItem]);
    }

    //get item details
    public function getItemDetails($id) {

        $items = DB::table('users')
                ->join('items', 'users.id', '=', 'items.user_id')
                ->where('items.id', '=', $id)
                ->select('items.*', 'users.location', 'users.name as owner', 'items.name')
                ->get();
        //dd()

        return view('item_details', compact('items'));
    }

    public function deleteItem($id) {
        $item = Item::find($id);
        $item->delete();
    }

    public function index() {
        return view('user_items');
    }

    public function updateItem(Request $request) {
        $this->Validate($request, [
            'name' => 'required|min:3|max:20',
            'description' => 'required|min:10|max:500',
            'price' => 'required'
        ]);

        if ($request->get('isOnline') == "on") {
            $isOnline = true;
        } else {
            $isOnline = false;
        }

        $Item = Item::find($request->input('id'));

        $Item->name = $request->input('name');
        $Item->description = $request->input('description');
        $Item->price = $request->input('price');
        $Item->isOnline = $isOnline;
        if ($request->file('photo')) {
            $Item->imagePath = $request->file('photo')->store('images/items');
        }
        $Item->save();
    }

    public function GetUserItems() {
        $id = Auth::id();
        $items = Item::all()->where("user_id", "=", $id);

        //dd($items);
        //$items=Item::paginate(7);
        return view('user_items', compact('items'));
    }

    public function getAllItems() {
        $items = DB::table('users')
                ->join('items', 'users.id', '=', 'items.user_id')
                ->select('items.*', 'users.location', 'users.name as owner', 'items.name')
                ->where('isOnline', '=', '1')
                ->get();

        return view('home', compact('items'));
    }

    public function searchItems(Request $request) {
        $searchKey = $request->input('q');
        //var_dump($searchKey);
        //$searchKey= "r";
        if ($searchKey != "") {
            $items = DB::table('items')
                    ->where('name', 'like', '%' . $searchKey . '%')
                    ->get();
            return response()->json(['items' => $items]);
        }
        // var_dump($items);
    }

}
