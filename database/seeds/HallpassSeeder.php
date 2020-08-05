<?php

use Illuminate\Database\Seeder;
use App\Hallpass;

class HallpassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hallpass = new Hallpass;
        $hallpass->location_id = '1';
        $hallpass->student_id = '5';
        $hallpass->staff_id = '3';
        $hallpass->save();

        $hallpass = new Hallpass;
        $hallpass->location_id = '1';
        $hallpass->student_id = '5';
        $hallpass->staff_id = '3';
        $hallpass->save();

        $hallpass = new Hallpass;
        $hallpass->location_id = '1';
        $hallpass->student_id = '5';
        $hallpass->staff_id = '3';
        $hallpass->save();

        $hallpass = new Hallpass;
        $hallpass->location_id = '1';
        $hallpass->student_id = '5';
        $hallpass->staff_id = '3';
        $hallpass->save();
    }
}
