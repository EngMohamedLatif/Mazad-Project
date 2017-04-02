<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;




class UserController extends Controller
{
	public function __construct(){
		$this->middleware("auth");
	}
	
    public function edit_user_data(){
       // $id = Auth::user()->id;
       // $user = User::find($id);
	   return view("edit_user_data");
    }
    public function update_user_data(request $request){
    	$id   = Auth::user()->id ;
    	$User = User::find($id);
    	if($request->save){
		$User->name=$request->name;
		$User->email=$request->email;
		$User->location =$request->location;
		$User->save();
		return redirect("/");
	}
	else{
          return redirect("/"); 
	}
    }
}
