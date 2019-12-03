<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IptvController extends Controller
{
    //

    public function setError($message){
        $resp = [];
        foreach ($message as $msg){
            array_push($resp, $msg);
        }
        return array('error'=>$message);
    }

    public function mailOut($message, $email){

    }

    public function clientMail($client){
        //prep client mail
    }

    public function unidid($val){
        $token = "";
        $codes = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codes .= ".-_!_-.";
        $codes .= uniqid('', false);
        $codes .= "abcdefghijklmnopqrstuvwxyz";
        $codes .= "0123456789";
        $max = strlen($codes);
        for($i=0; $i < $val; $i++){
            $token.= $codes[random_int(0, $max-1)];
        }
        return $token;
    }

    public function timeFromNow($number, $type){
        $aday = 60*60*24;
        if($type==='days'){
            return time()+($aday*$number);
        }

        if($type==='weeks'){
            $aday = $aday*7;
            return time()+($aday*$number);
        }

        if($type==='months'){
            $aday = $aday*30;
            return time()+($aday*$number);
        }

        if($type==='years'){
            $aday = $aday*364;
            return time()+($aday*$number);
        }

    }

}
