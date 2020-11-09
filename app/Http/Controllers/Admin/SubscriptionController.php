<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StoreSubscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }
    public function add_subscription(Request $request){

        $data = request()->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'days'=>'required|numeric',
            'description'=>'required',
        ]);
        $data['is_active'] = isset($request['is_active']) ? 1:0;


        if(StoreSubscription::create($data))
            return back()->with("MSG","Record added successfully")->with("TYPE", "success");
    }

    public function editsubscription(Request $request,$id){

        $data = request()->validate([
            'name'=>'required',
            'price'=>'required',
            'days'=>'required',
            'description'=>'',

        ]);
        $data['is_active'] = isset($request['is_active']) ? 1:0;


        if(StoreSubscription::whereId($id)->update($data)) {
            return back()->with("MSG", "Subscription Details Updated Successfully.")->with("TYPE", "success");
        }
    }
}
