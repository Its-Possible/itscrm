<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if(env('APP_DEBUG')) {
            $user = new User();
            $user->firstname = "Eduardo";
            $user->lastname = "Bessa";
            $user->username = "webmaster";
            $user->email = "webmaster@localhost";
            $user->password = bcrypt("password");
            $user->save();
        }
    }
}
