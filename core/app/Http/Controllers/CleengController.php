<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Client as NetClient;
use GuzzleHttp as guzzler;
use Illuminate\Support\Facades\Auth;

class CleengController extends Controller
{
    //
    public function videoOnDemand(){

        //get user
        $authUser = Auth::guard('client')->user();
        $vidAccess = $authUser->hasAccess();

        $client = new NetClient(['timeout'  => 30.0,]);
        $url = "https://api.cleeng.com/3.0/json-rpc";
        $response = null;

        $jsonForm = [

            'method'=>'listVodOffers',
            'params'=>[
                'publisherToken'=>env('CLEENG_API', ''),
                'criteria'=>[],
                'offset'=>0,
                'limit'=>12,
            ],
            'jsonrpc'=>2.0,
            'id'=>1
        ];

        try{
            $request = $client->request('POST', $url,['json' => [$jsonForm]]);

            $response = $request->getBody()->getContents();
            $response = guzzler\json_decode($response);
            $response = $response[0]->result->items;

            //remove no access files
            $videos = array();
            foreach ($response as $vids){


                if($vidAccess){
                    if($vids->price > 0){
                        array_push($videos, $vids);
                    }else{
                        array_push($videos, $vids);
                    }
                }else{
                    if($vids->price > 0){
                        //do nothing
                    }else{
                        array_push($videos, $vids);
                    }
                }
            }

            return response()->json($videos);

        }catch (\Exception $e){

            return response()->json([
                'error' => true,
                'message'=> $e->getMessage(),
            ], 200);
        }
    }

    public function test(){

//        $cleeng = new \Cleeng_Api();

//        return $cleeng->getCustomer();

        $data = [
            'publisherToken'=>env('CLEENG_API', ''),
            'customerData' => [
                'email' => "icekidben@gmail.com",
                'locale' => "en_NG",
                'country' => "NG",
                'currency' => "NGN",
                'password' => "password",
            ]

        ];

        return $this->cleeng('registerCustomer',$data);

//        $cleengApi = new Cleeng_Api();
    }

    public function cleeng($method, $data){


        $client = new NetClient(['timeout'  => 30.0,]);
//        $url = "https://api.cleeng.com/3.0/json-rpc";
        $url = "https://sandbox.cleeng.com/api/3.0/json-rpc";
        $response = null;

        $jsonForm = [

            'method'=>$method,
            'params'=>[
                $data

            ],
            'jsonrpc'=>2.0,
            'id'=>1
        ];

//        return $jsonForm;

        try{
            $request = $client->request('POST', $url,['json' => [$jsonForm]]);

            $response = $request->getBody()->getContents();
            $response = json_decode($response);
//            return response()->json($response[0]->result);

        }catch (\Exception $e){

            return response()->json([
                'error' => true,
                'message'=> $e->getMessage(),
            ], 200);
        }
//        return view('pages.channels.index')->with('listVods', $response[0]);
        return response()->json($response);

    }
}
