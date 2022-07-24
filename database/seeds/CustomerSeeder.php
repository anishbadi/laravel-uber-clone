<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::updateOrCreate([
            "email" => "john@example.com",
        ],[
            "name" => "John Due",
            "email" => "john@example.com",
        ]);

        Customer::updateOrCreate([
            "email" => "joni@example.com",
        ],[
            "name" => "Joni Cobb",
            "email" => "joni@example.com",
        ]);

        Customer::updateOrCreate([
            "email" => "kenny@example.com",
        ],[
            "name" => "Kenny Lam",
            "email" => "kenny@example.com",
        ]);

        Customer::updateOrCreate([
            "email" => "sherry@example.com",
        ],[
            "name" => "Sherry Walt",
            "email" => "sherry@example.com",
        ]);
    }
}
