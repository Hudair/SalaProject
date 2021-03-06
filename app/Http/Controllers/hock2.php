<?php
namespace App\Http\Controllers;

use App\Events\getProductFromPOS;
use App\Events\OrderCreatedWebHock;
use App\Events\SalaOrderCreated;
use App\Helpers\SalaClass;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
class hock2 extends Controller
{
    public function  hock2(Request $request)
    {
            if($request->event == 'order.created'){
                info('order_created' . $request->data['items'][0]['product']['id']);
                event(new OrderCreatedWebHock($request->data['items'][0]['product']['id']));
            }
            if($request->event == 'app.settings.updated'){
                info($request->merchant);
                info($request->data['settings']['secret_key']);
                $client  = Client::where('merchant_id' , $request->merchant)->first();
                info(encrypt($request->data['settings']['secret_key']));
                // update user ----------------------------------------;
                $client->update([
                'pos_secret' => encrypt($request->data['settings']['secret_key']),
                'pos_email' => $request->data['settings']['pos_email'],
                'pos_products_count' => $request->data['settings']['count'],
                'password' => bcrypt($request->data['settings']['password']),
                'email' => $request->data['settings']['user_email'],
            ]);
            event(new getProductFromPOS($client->id));
            }
            info($request);
        }
}
