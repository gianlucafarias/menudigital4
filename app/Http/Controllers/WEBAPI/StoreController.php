<?php

namespace App\Http\Controllers\WEBAPI;

use App\Application;
use App\Category;
use App\Http\Controllers\Controller;
use App\Models\Addon;
use App\Models\AddonCategory;
use App\Models\AddonCategoryItem;
use App\Models\Store;
use App\Models\StoreSlider;
use App\Models\Table;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function fetch(Request $request){
        $view_id =  $request->view_id;
        if(Store::all()->where('view_id','=',$view_id)->count() ==0){
            return response()->json([
                "success"=> false,
                "status"=>"error",
                "error"=>["code"=>401,
                    "type"=>"data not found (ERROR:RT404)",
                    "message"=>"We are unable to process your request at this time. Please try again later"
                ],
            ], 401);
        }
        if(Store::all()->where('view_id','=',$view_id)->where('is_visible','=',1)->count()==0)
            return view('Home.404');
        $store = Store::all()->where('view_id','=',$view_id)->first();
        $store_id  = $store['id'];
        $store_name  = $store['store_name'];
        $is_accept_order  = $store['is_accept_order'];
        $description  = $store['description'];
        $sliders_data = StoreSlider::all()->where('is_visible','=',1)->where('store_id','=',$store_id);
        $table_data = Table::all()->where('is_active','=',1)->where('store_id','=',$store_id);
        $tables = [];
        $sliders=[];
        foreach ($table_data as $value)
            $tables[]=$value;
        foreach ($sliders_data as $value)
            $sliders[]=$value;
        $recommended_data = Product::with(['addonItems.categories.addons'])->where('store_id','=',$store_id)
            ->where('is_recommended','=',1)
            ->where('is_active','=',1)->orderBy('name')->get();
        $recommended=[];
        foreach ($recommended_data as $value)
            $recommended[]=$value;
        $categories_data = Category::all()->where('store_id','=',$store_id)
            ->where('is_active','=',1)->sortBy('name');
        $categories=[];
        foreach ($categories_data as $value)
            $categories[]=$value;
        $products_data = Product::with(['addonItems.categories.addons'])->where('store_id','=',$store_id)
            ->where('is_active','=',1)->orderBy('name')->get();
        $products=[];
        foreach ($products_data as $value)
            $products[] = $value;

//        return $products;
        $account_info = Application::all()->first();
        $Addon_product = Addon::all()->where('store_id','=',$store_id);
        $addons = [];
        foreach ($Addon_product as $value)
            $addons[] = $value;
        return response()->json([
            "success" => true,
            "status" => "success",
            "payload" => [
                'data' => [
                    'recommended'=>$recommended,
                    'categories'=>$categories,
                    'products'=>$products,
                    'account_info'=>$account_info,
                    'store_name'=>$store_name,
                    'description'=>$description,
                    'sliders'=>$sliders,
                    'tables'=>$tables,
                    'is_accept_order'=>$is_accept_order,
                    'addons'=>$addons
                ],
            ]
        ], 200);
    }
}
