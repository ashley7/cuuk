@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">         
                <div class="card-body">  
                    
                    <div class="row">
                        <div class="col-md-6">
                            <img src="/images/logo.png" width="100%">
                            <h2>{{$user->name}}</h2>
                            <p>Exp date: {{$account_card->expiry_date}}</p>
                        </div>

                        <div class="col-md-6">
                            <img src="/images/qrcode.png" width="50%">
                            <h2>Card No. {{$account_card->card->card_number}}</h2>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
