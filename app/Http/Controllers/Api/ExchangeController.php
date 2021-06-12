<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Coin;
use Illuminate\Support\Facades\DB;

class ExchangeController extends Controller
{
    public function index(Request $request){

        $base = $request['base'];
        $to = $request['to'];
        $value = $request['value'];

        if($base === null || $to === null || $value === null){
            return "URL mal formatada";
        }
        $base = Coin::all()->where('abbreviation', $base);
        $to = Coin::all()->where('abbreviation', $to);


        foreach ($base as $item) {
            $baseCoin = $item;
        }
        foreach ($to as $item) {
            $toCoin = $item;
        }

        $result = $this->calc($baseCoin, $toCoin, $value);

        $result = number_format($result,2);

        return $result;

    }

    public function calc($base, $to, $value = null){


            $aux = $base->DolVal;
            $result = ($aux/$to->DolVal);
            if($value !== null){
                $result *= $value;
            }

            return $result;


    }

    /*
     * REAL PRA EURO
     * 1 REAL = 0.20 DOL (AUX)
     * $RESULT = AUX/EURO->DOLVAL
     */
}


