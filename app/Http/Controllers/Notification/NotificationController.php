<?php

namespace App\Http\Controllers\Notification;

use App\Application;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Store;
use Illuminate\Http\Request;
use Twilio;
class NotificationController extends Controller
{
    public function WhatsAppOrderNotification($order){
        $isEnable = Setting::all()->where('key','IsSandBoxEnabled')->first();
        $isEnableStore = Setting::all()->where('key','IsStoreEnabled')->first();
        $sid= Setting::all()->where('key','SandBoxID')->first()->value;
        $token = Setting::all()->where('key','SandBoxToken')->first()->value;
//        return Store::find($order[0]['store_id'])->phone;
        if($isEnable->value == "1" && $isEnableStore->value == "1") {

            $store = Store::find($order[0]['store_id']);
//        return $order[0]['order_unique_id'];
                $body = "";

                $account_info = Application::all()->first();
                foreach ($order as $order_data) {

                    foreach ($order_data['order_details'] as $key => $data) {

                        $body .= $data['name'] . " - " . $data['price'] . " x " . $data['quantity'] . " = " . ($data['quantity'] * $data['price'] . "\n");
                        foreach ($data['order_details_extra_addon'] as $key => $exra) {
                            $body .= "--" . $exra['addon_name'] . " - " . $exra['addon_price'] . " x " . $exra['addon_count'] . " = " . ($exra['addon_count'] * $exra['addon_price'] . "\n");
                        }
                    }
                    $body .= "Table:{$order_data['table_no']}\n";
                    $body .= "Total:{$order_data['total']}";

                }
                $client = new Twilio\Rest\Client($sid, $token);
            try {

                $phone=  str_replace(' ','',$store->phone);

                $message = $client->messages->create(
                    "whatsapp:".$phone, // Text this number
                    [
                        'from' => 'whatsapp:+14155238886', // From a valid Twilio number
                        'body' => "New Order - {$order[0]['order_unique_id']} \n {$body}"
                    ]
                );
//            return $store;
            } catch (\Exception $e) {

            }

        }
    }

}
