<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoController extends CleengController
{
    public function getvids(Request $request){
        return $this->videoOnDemand();
    }
}
