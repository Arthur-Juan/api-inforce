<?php

namespace App\Http\Controllers;
use App\Models\Coin;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $coins = Coin::all();
        return view('home.index',['coins'=>$coins]);
    }
}
