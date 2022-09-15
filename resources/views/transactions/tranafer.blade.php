@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">              

                <div class="card-body">
                  <h3 class="text-success">{{$title}}</h3>

                  <p>Name: {{$user->name}}</p>

                  <form action="{{route('transactions.store')}}" method="POST">
                    @csrf
                    
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount">
                    <hr>
                    <input type="radio" name="transaction_type" checked value="deposit">Deposit
                    <input type="radio" name="transaction_type" value="withdraw"> Withdraw
                    <hr>

                    <input type="hidden" name="card_account_id" value="{{$account->id}}">
                    <input type="hidden" name="user_id" value="{{$user->id}}">

                    <label>Reason</label>
                    <input type="text" name="reason" class="form-control">

                    <label>PIN</label>
                    <input type="text" name="pin" class="form-control">

                    <hr>
                    <button>Save</button>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
