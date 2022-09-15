@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a class="btn btn-success" href="{{route('users.create')}}">Agent</a>
        <hr>

        <div class="card">           
            <div class="card-body">

            <form method="POST" action="{{route('users.store')}}">
                @csrf
                <label>Name</label>
                <input type="text" class="form-control" name="name">

                <label>Phone number (Used for communication)</label>
                <input type="text" class="form-control" name="phone_number">

                <label>User type</label><br>
                <input type="radio" checked name="user_type" value="agent"> Agent

                <input type="radio"  name="user_type" value="marchant"> Marchant
                <br>

                <label>Select Card</label><br>
                @foreach($cards as $card)
                    <input type="radio" name="card_id" value="{{$card->id}}"> {{$card->card_number}}<br>
                @endforeach

                <label>Pin</label>
                <input type="number" class="form-control" name="password">

                <label>Confirm Pin</label>
                <input type="number" class="form-control" name="password_confirmation">

                <hr>

                <button type="submit">Save</button>

            </form>             
                   

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection