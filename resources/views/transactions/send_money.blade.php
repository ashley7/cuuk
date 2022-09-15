@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">              

                <div class="card-body">
                  <h3 class="text-success">{{$title}}</h3>

                  <form action="{{route('card_account.store')}}" method="POST">
                    @csrf

                    <label>Marchant number</label>
                    <input type="text" class="form-control" name="card_id">

                    <hr>
                    <button>Verify</button>

                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
