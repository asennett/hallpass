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
      $bathroom = new Location;
      $bathroom->name = 'North Bathroom';
      $bathroom->capacity = '6';
      $bathroom->save();

      $bathroom = new Location;
      $bathroom->name = 'South Bathroom';
      $bathroom->capacity = '6';
      $bathroom->save();

      $bathroom = new Location;
      $bathroom->name = "Nurse's office";
      $bathroom->capacity = '3';
      $bathroom->save();
    }
}
