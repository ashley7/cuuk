<?php

namespace App\Http\Controllers;
use App\User;
use App\Card;
use App\CardAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::where('user_type','!=','admin')->get();        

        $data = [
            'users'=>$users,
            'titlt' => "Agents",
        ];

        return view('users.agents')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cards = Card::where('status','available')->get()->take(3);

        $data = [
            'titlt' => "Agents",
            'cards' => $cards,
        ];

        return view('users.create_user')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:25'],
            'user_type' => ['required'],
            'card_id' => ['required'],            
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ];

        $this->validate($request,$data);

        $saveUser = new User();

        $saveUser->name = $request->name;

        $saveUser->phone_number = $request->phone_number;

        $saveUser->user_type = $request->user_type;

        $saveUser->password = \Hash::make($request->password);

        $saveUser->pin = $request->password;

        $saveUser->save();

        CardAccount::chooseCard($request->card_id, $saveUser->id);

        return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $card = CardAccount::where('user_id',$id)->get()->last();        

        $data = [
            'user'=>$user,
            'title'=>'Card',
            'account_card'=>$card,
        ];

        return view('users.card')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
