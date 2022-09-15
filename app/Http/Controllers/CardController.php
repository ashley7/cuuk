<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {

        $saveCard = new Card();

        $saveCard->card_number = rand(1000,5000);

        try {

            $saveCard->save();

        } catch (\Throwable $th) {}            
        
    }

 
    public function show(Card $card)
    {
        //
    }

 
    public function edit(Card $card)
    {
        //
    }

  
    public function update(Request $request, Card $card)
    {
        //
    }

   
    public function destroy(Card $card)
    {
        //
    }
}
