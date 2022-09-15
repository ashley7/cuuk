@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">              

                <div class="card-body">
                  <h3 class="text-success">{{$title}}</h3>

                  @foreach($transactions as $transaction)
                    <p>{{$transaction->date_paid}}</p>
                    <h2 class="text-success">UGX {{number_format($transaction->amount)}}</h2>
                    <p>Charge: {{$transaction->charges}}</p>
                    <p>From: {{App\User::find($transaction->source_id)->name}}</p>
                    <p>To: {{App\User::find($transaction->user_id)->name}}</p>
                    
                    @if($transaction->source_id == $user->id)
                      <p class="text-warning">Sending</p>
                    @endif

                    @if($transaction->user_id == $user->id)
                    <p class="text-success">Deposit</p>
                    @endif

                    <hr>
                  @endforeach


                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
