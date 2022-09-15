<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $saveUser = new User();

        $saveUser->name = "CUUK Admin";

        $saveUser->phone_number = "0708123456";

        $saveUser->user_type = "admin";

        $saveUser->password = \Hash::make(1234);

        $saveUser->pin = "1234";

        $saveUser->save();


    }
}
