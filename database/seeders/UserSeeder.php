<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = new User();
        $user->firstname = Crypt::encrypt("Webmaster");
        $user->lastname = Crypt::encrypt("");
        $user->username = "webmaster";
        $user->email = "webmaster@localhost";
        $user->password = bcrypt("password");
        $user->save();

        $user = new User();
        $user->firstname = Crypt::encrypt("Administrador");
        $user->lastname = Crypt::encrypt("");
        $user->username = "administrador";
        $user->email = "admin@localhost";
        $user->password = bcrypt("password");
        $user->save();

        //
        if(env('APP_DEBUG')) {
            $user = new User();
            $user->firstname = Crypt::encrypt("Eduardo");
            $user->lastname = "Bessa";
            $user->username = "eduardo.bessa";
            $user->email = "eduardo.bessa@localhost";
            $user->password = bcrypt("password");
            $user->save();
        }
    }
}
