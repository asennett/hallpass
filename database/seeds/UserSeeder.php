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
        $super_admin->fname = 'Aurelian';
        $super_admin->lname = 'Sennett';
        $super_admin->email = 'super@sdale.org';
        $super_admin->password = bcrypt('vbnmkjhgfdsdfghjSDFSDFGHJIUY123456!@#)(*&^%)');
        $super_admin->role_id = '1';
        $super_admin->save();

        $admin = new User;
        $admin->fname = 'Kelly';
        $admin->lname = 'Boortz';
        $admin->email = 'admin@sdale.org';
        $admin->password = bcrypt('admin');
        $admin->role_id = '2';
        $admin->save();

        $teacher = new User;
        $teacher->fname = 'Michael';
        $teacher->lname = 'Marquette';
        $teacher->email = 'teacher@sdale.org';
        $teacher->password = bcrypt('oierlkjnc,v.mxclkfUIklUOI86809089^&^*');
        $teacher->role_id = '3';
        $teacher->save();

        $teacher2 = new User;
        $teacher2->fname = 'Aaron';
        $teacher2->lname = 'Tinnin';
        $teacher2->email = 'teacher2@sdale.org';
        $teacher2->password = bcrypt('oierlkjnc,v.mxclkfUIklUOI86809089^&^*');
        $teacher2->role_id = '3';
        $teacher2->save();

        $student1 = new User;
        $student1->fname = 'Grant';
        $student1->lname = 'Sennett';
        $student1->email = 'student@sdale.org';
        $student1->password = bcrypt('asdlf;kjasdlksadflksdflkjsdflkjasdflkjlasdflkjwoeiruoiwe,mn');
        $student1->save();

        $student2 = new User;
        $student2->fname = 'Eleanor';
        $student2->lname = 'Adcock';
        $student2->email = 'student1@sdale.org';
        $student2->password = bcrypt('student');
        $student2->save();

        $student3 = new User;
        $student3->fname = 'Piper';
        $student3->lname = 'Carr';
        $student3->email = 'student2@sdale.org';
        $student3->password = bcrypt('student');
        $student3->save();

        $student4 = new User;
        $student4->fname = 'Bradley';
        $student4->lname = 'Dixon';
        $student4->email = 'student3@sdale.org';
        $student4->password = bcrypt('student');
        $student4->save();
    }
}
