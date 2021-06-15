<?php


namespace App\Repositories;


use App\Models\Coin;

class ExchangeRepository
{

    public static function MakeCalc($baseReq, $toReq, $value): array
    {
        //confere se os valores vieram certo
        if($baseReq === null || $toReq === null || $value === null){
            return [
                'status'=>'error',
                'data'=>'Preencha todos os campos!'
            ];
        }

        //confere se as moedas não são iguais
        if($baseReq === $toReq){
            return [
                'status'=>'ERROR',
                'data'=>'As moedas não podem ser as mesmas!'
            ];

        }

        $base = Coin::all()->where('abbreviation', $baseReq)->first();
        $to = Coin::all()->where('abbreviation', $toReq)->first();

        //se retornar null é por que a moeda não consta no banco
        if($base ===null){
            return [
                'status'=>'error',
                'data'=>[
                    'A moeda '.$baseReq.' não existem em nosso banco de dados!'
                ]
            ];
        }

        if($to === null){
            return [
                'status'=>'error',
                'data'=>[
                    'A moeda '.$toReq.' não existe em nosso banco de dados!'
                ]
            ];
        }

        //confere se o valor não é numérico
        if( ! is_numeric($value)){
            return [
                'status'=>'error',
                'data'=>[
                    'O valor precisa ser numérico!'
                ]
            ];
        }

        //confere se o valor é negativo
        if($value <= 0 ){
            return [
                'status'=>'error',
                'data'=>[
                    'O valor precisa ser positivo!'
                ]
            ];
        }


        //realiza o cálculo
        $result = self::calc($base,$to, $value);
        $result = number_format($result, 2);
        return [
            'status'=>'success',
            'data'=>[
                "base"=>$base->abbreviation,
                "to"=>$to->abbreviation,
                "value"=>$result .' ' .$to->abbreviation
            ]
        ];

    }

    private static function calc ($base, $to, $value = null){


        $aux = $base->DolVal;
        if($value !== null){
            $aux *= $value;
        }
        return ($aux/$to->DolVal);


    }


}
