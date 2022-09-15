<?php

namespace App\Http\Controllers;

use App\CardAccount;
use App\User;
use App\Card;
use Illuminate\Http\Request;

class CardAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['card_id'=>'required']);
        
        $account = CardAccount::select('card_accounts.id','card_accounts.user_id','card_accounts.card_id','cards.card_number')
                                ->where('card_number',$request->card_id)
                                ->where('status','used')
                                ->join('cards','card_accounts.card_id','cards.id')->get();  

        if($account->count() == 0)

            return redirect('/home')->with(['status'=>'Card not found']);

        $account =  $account->last();
        
        $user = User::find($account->user_id);

        $card = Card::find($account->card_id);

        $data = [
            'user'=>$user,
            'card'=>$card,
            'account'=>$account,
            'title'=>'Make payment'
        ];

        return view('transactions.tranafer')->with($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CardAccount  $cardAccount
     * @return \Illuminate\Http\Response
     */
    public function show(CardAccount $cardAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CardAccount  $cardAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(CardAccount $cardAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CardAccount  $cardAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardAccount $cardAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CardAccount  $cardAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardAccount $cardAccount)
    {
        //
    }
}
