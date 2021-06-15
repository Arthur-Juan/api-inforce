<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coins')->insert([
            'name' => 'Dolar',
            'abbreviation' => 'USD',
            'DolVal' => 1
        ]);
        DB::table('coins')->insert([
            'name' => 'Real',
            'abbreviation' => 'BRL',
            'DolVal' => 0.20
        ]);

        DB::table('coins')->insert([
            'name' => 'Euro',
            'abbreviation' => 'EUR',
            'DolVal' => 1.21
        ]);


    }
}
