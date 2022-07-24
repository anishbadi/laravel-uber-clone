<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::updateOrCreate([
            "name" => "Hebbala",
        ],[
            "name" => "Hebbala",
            "latitude" => "36.629349",
            "longitude" => "6.379350",
        ]);

        Location::updateOrCreate([
            "name" => "Kengeri",
        ],[
            "name" => "Kengeri",
            "latitude" => "12.899623",
            "longitude" => "77.482697",
        ]);

        Location::updateOrCreate([
            "name" => "Krishnarajapura",
        ],[
            "name" => "Krishnarajapura",
            "latitude" => "12.0325216",
            "longitude" => "76.8056333",
        ]);

        Location::updateOrCreate([
            "name" => "Yelahanka",
        ],[
            "name" => "Yelahanka",
            "latitude" => "13.100370",
            "longitude" => "77.596268",
        ]);

        Location::updateOrCreate([
            "name" => "Anekal",
        ],[
            "name" => "Anekal",
            "latitude" => "12.7086373",
            "longitude" => "77.6993972",
        ]);
    }
}
