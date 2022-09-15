@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">              

                <div class="card-body">

                @if(Auth::user()->user_type == "admin")
                <a class="btn btn-success btn-block" href="{{route('users.index')}}">Agent and Marchants</a>
                @endif

                <a class="btn btn-success btn-block" href="{{route('transactions.create')}}">Transfer money</a>
                    
                <a class="btn btn-success btn-block" href="{{route('transactions.index')}}">Transactions</a>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
