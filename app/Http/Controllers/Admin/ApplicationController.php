<?php

namespace App\Http\Controllers\Admin;


use App\Application;
use App\Homes;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Store;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class ApplicationController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }
    public function update_account(Request $request){

        $data = request()->validate([
            'application_name'=>'required',
            'application_email'=>'required',
            'currency_symbol'=>'required',
            'contact_no'=>'required',
            'address'=>'required'
        ]);
        if($request->application_logo !=NULL) {
            $url = $request->file("application_logo")->store('public/account');
            $data['application_logo'] = str_replace("public","storage",$url);
        }else{
            $data['application_logo'] = Application::all()->first()->application_logo;
        }
        if(Application::all()->count()>0)
        {
            if($request->application_logo !=NULL) {
                Storage::delete(str_replace("storage", "public", Application::all()->first()->application_logo));
            }
                Application::destroy(Application::all()->first()->id);
        }
        if(Application::create($data))
            return back()->with("MSG","Record added successfully")->with("TYPE", "success");
        }

        public function update_payment_settings(Request $request){
            $data = $request;
            $data['1'] = isset($request['1']) ? 1:0;
            unset($data['_token']);
//            return $data;
//            return array_count_values($data);


            Setting::whereId(1)->update(['value'=>$data[1]]);
            Setting::whereId(2)->update(['value'=>$data[2]]);
            Setting::whereId(3)->update(['value'=>$data[3]]);
            Setting::whereId(4)->update(['value'=>$data[4]]);

            return back()->with("MSG","Record update successfully")->with("TYPE", "success");


        }

        public function update_account_settings(Request $request){

            $data = request()->validate([
                'name'=>'required',
                'email' => 'unique:users,email,'.auth()->id()
            ]);

            if($request->password == NULL)
                unset($data['password']);
            else
                $data['password'] = Hash::make($request['password']);

            if(User::whereId(auth()->id())->update($data)) {
                return back()->with("MSG", "Account Settings Updated Successfully.")->with("TYPE", "success");
            }

        }

    public function update_privacy_policy(Request $request){

        $data = $request;

        Setting::whereId(10)->update(['value'=>$data[10]]);

        return back()->with("MSG","Record update successfully")->with("TYPE", "success");

    }


    public function update_whatsapp(Request $request){
        $data = $request;
        $data['5'] = isset($request['5']) ? 1:0;
        $data['9'] = isset($request['9']) ? 1:0;
        unset($data['_token']);


        Setting::whereId(5)->update(['value'=>$data[5]]);
        Setting::whereId(6)->update(['value'=>$data[6]]);
        Setting::whereId(7)->update(['value'=>$data[7]]);
        Setting::whereId(8)->update(['value'=>$data[8]]);
        Setting::whereId(9)->update(['value'=>$data[9]]);
        Setting::whereId(11)->update(['value'=>$data[11]]);

        return back()->with("MSG","Record update successfully")->with("TYPE", "success");


    }


}