<?php

use Illuminate\Database\Seeder;

use App\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 100 ; $i++) { 

            $saveCard = new Card();
            $saveCard->card_number = rand(1000,9999);    
            try {
                $saveCard->save();
            } catch (\Throwable $th) {}
        }
       

        
    }
}
