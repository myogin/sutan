<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("users")->truncate();

        $administrator = new \App\User;
        $administrator->name = "admin";;
        $administrator->email = "demo1@gmail.com";
        $administrator->password = \Hash::make("admin");
        $administrator->Status = 0;
        $administrator->save();
    }
}
