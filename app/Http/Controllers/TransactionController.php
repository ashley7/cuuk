<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\CardAccount;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $transactions = Transaction::where('user_id',$user->id)->orWhere('source_id',$user->id)->get();

        $data = [
            'transactions'=>$transactions,
            'title'=>'Transactions',
            'user'=>$user,
        ];

        return view('transactions.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => "Tranfer money",
        ];

        return view('transactions.send_money')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cardAccount = CardAccount::find($request->card_account_id); 

        if($cardAccount->user->pin != $request->pin)

            return redirect('/home')->with(['status'=>'Bad pin, Failed']);

        $transaction = new Transaction();

        $transaction->card_account_id = $request->card_account_id;

        $transaction->user_id = $request->user_id;

        $transaction->source_id = \Auth::id();

        $transaction->transaction_type = $request->transaction_type;

        $transaction->amount = $request->amount;

        $transaction->charges = 0;

        $transaction->date_paid = now();

        $transaction->reason = $request->reason;

        $transaction->save();

        return redirect()->route('transactions.index');
        
    }

    public function verifyTransaction(Request $request)
    {

        $data = [
            'title' => "Withdraw money",
        ];

        return view('transactions.withdraw_money')->with($data);

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
