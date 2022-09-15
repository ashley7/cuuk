<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Card;

class CardAccount extends Model
{

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public static function chooseCard($card_id, $user_id)
    {
        $cardAccount = new CardAccount();

        $cardAccount->card_id = $card_id;

        $cardAccount->user_id = $user_id;

        $cardAccount->expiry_date = now()->addMonths(24);

        $cardAccount->save();

        $updateCard = Card::find($cardAccount->card_id);

        $updateCard->status = "used";

        $updateCard->save();
    }
}
