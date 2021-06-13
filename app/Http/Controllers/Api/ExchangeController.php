<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Coin;

class ExchangeController extends Controller
{
    public function index(Request $request){

        $base = $request['base'];
        $to = $request['to'];
        $value = $request['value'];

        if($base === null || $to === null || $value === null){
            $ret = [
                'status'=>'error',
                'data'=>'URL mal formatada'
            ];

            return $ret;
        }

        if($base === $to){
            $ret = [
                'status'=>'ERROR',
                'data'=>'As moedas não podem ser as mesmas'
            ];
            return $ret;

        }

        $base = Coin::all()->where('abbreviation', $base);
        $to = Coin::all()->where('abbreviation', $to);


        foreach ($base as $item) {

            $baseCoin = $item;

        }
        foreach ($to as $item) {
            if($to){
                $toCoin = $item;
            }

        }




        $result = $this->calc($baseCoin, $toCoin, $value);

        $result = number_format($result,2);

        $ret = [
          'status'=>'success',
          'data'=>[
              "base"=>$baseCoin->abbreviation,
              "to"=>$toCoin->abbreviation,
              "value"=>$result .' ' .$toCoin->abbreviation
          ]
        ];

        return $ret;

    }

    public function calc($base, $to, $value = null){


        $aux = $base->DolVal;
        if($value !== null){
         $aux *= $value;
        }
            $result = ($aux/$to->DolVal);


            return $result;


    }

    public function validade($base, $to, $value){

    }

}


