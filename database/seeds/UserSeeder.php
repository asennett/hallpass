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
        $super_admin = new User;
        $super_admin->fname = 'Super';
        $super_admin->lname = 'User';
        $super_admin->email = 'super@example.com';
        $super_admin->password = bcrypt('vbnmkjhgfdsdfghjSDFSDFGHJIUY123456!@#)(*&^%)');
        $super_admin->role_id = '1';
        $super_admin->save();

        $admin = new User;
        $admin->fname = 'Admin';
        $admin->lname = 'User';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->role_id = '2';
        $admin->save();

        $teacher = new User;
        $teacher->fname = 'Teacher';
        $teacher->lname = 'User';
        $teacher->email = 'teacher@sdale.org';
        $teacher->password = bcrypt('oierlkjnc,v.mxclkfUIklUOI86809089^&^*');
        $teacher->role_id = '3';
        $teacher->save();

        $teacher2 = new User;
        $teacher2->fname = 'Teacher2';
        $teacher2->lname = 'User';
        $teacher2->email = 'teacher2@sdale.org';
        $teacher2->password = bcrypt('oierlkjnc,v.mxclkfUIklUOI86809089^&^*');
        $teacher2->role_id = '3';
        $teacher2->save();

        $student1 = new User;
        $student1->fname = 'Student';
        $student1->lname = 'User';
        $student1->email = 'student@sdale.org';
        $student1->password = bcrypt('asdlf;kjasdlksadflksdflkjsdflkjasdflkjlasdflkjwoeiruoiwe,mn');
        $student1->save();

        $student2 = new User;
        $student2->fname = 'Student2';
        $student2->lname = 'User';
        $student2->email = 'student1@sdale.org';
        $student2->password = bcrypt('asdlf;kjasdlksadflksdflkjsdflkjasdflkjlasdflkjwoeiruoiwe,mn');
        $student2->save();

        $student3 = new User;
        $student3->fname = 'Student3';
        $student3->lname = 'User';
        $student3->email = 'student2@sdale.org';
        $student3->password = bcrypt('student');
        $student3->save();

        $student4 = new User;
        $student4->fname = 'Student4';
        $student4->lname = 'User';
        $student4->email = 'student3@sdale.org';
        $student4->password = bcrypt('student');
        $student4->save();
    }
}
