<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $super_admin = new Role;
      $super_admin->role_id = '1';
      $super_admin->name = 'Super Admin';
      $super_admin->save();

      $admin = new Role;
      $admin->role_id = '2';
      $admin->name = 'Admin';
      $admin->save();

      $teacher = new Role;
      $teacher->role_id = '3';
      $teacher->name = 'Teacher';
      $teacher->save();

      $student = new Role;
      $student->role_id = '4';
      $student->name = 'Student';
      $student->save();
    }
}
