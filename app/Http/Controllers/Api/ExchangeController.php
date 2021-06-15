<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Coin;
use \App\Repositories\ExchangeRepository;

class ExchangeController extends Controller
{
    public function index(Request $request){

        $baseReq = $request['base'];
        $toReq = $request['to'];
        $value = $request['value'];

        $ret = ExchangeRepository::makeCalc($baseReq, $toReq,$value);

        return $ret;

    }


    public function validade($base, $to, $value){

    }

}


