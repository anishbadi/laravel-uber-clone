<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            "email" => "admin@example.com",
        ],[
            "name" => "Admin",
            "email" => "admin@example.com",
            "is_admin" => 1,
            "password" => Hash::make('Admin@123'),
        ]);
    }
}
