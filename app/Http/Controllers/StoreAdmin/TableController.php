<?php

namespace App\Http\Controllers\StoreAdmin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth:store');
    }

    public function add_table(Request $request)
    {
        $data = request()->validate([
            'table_name' => 'required',
        ]);

        $data['store_id'] = auth()->id();
        $data['is_active'] = isset($request['is_active']) ? 1:0;

        if (Table::create($data))
            return back()->with("MSG", "Record added successfully")->with("TYPE", "success");
    }

    public function edit_table(Request $request,$id){

        $data = request()->validate([
            'table_name'=>'required',

        ]);
        $data['store_id'] = auth()->id();
        $data['is_active'] = isset($request['is_active']) ? 1:0;


        if(Table::whereId($id)->update($data)) {
            return back()->with("MSG", "Table Details Updated Successfully.")->with("TYPE", "success");
        }
    }
}
