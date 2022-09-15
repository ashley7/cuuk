@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a class="btn btn-success" href="{{route('users.create')}}">Add new user</a>
        <hr>

        <div class="card">           
            <div class="card-body">
                <table class="table">
                    <th>Name</th>
                    <th>Phone number</th>
                    <th>Details</th>

                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>
                            <a href="{{route('users.show',$user->id)}}">Card</a>
                        </td>
                      </tr>
                    @endforeach
                </table>       
               
                   

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection