<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Blood;
use App\Models\Myparent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => 'عمر سعودي', 'en' => 'Omar Saoudi'];
        $students->email = 'saoudiomar518@gmail.com';
        $students->password = Hash::make('1');
        $students->gender_id = Gender::all()->unique()->random()->id;
        $students->nationalitie_id = Nationalitie::all()->unique()->random()->id;
        $students->blood_id = Blood::all()->unique()->random()->id;
        $students->date_birth = date('1998-07-13');
        $students->grade_id = Grade::all()->unique()->random()->id;
        $students->classroom_id = Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = Myparent::all()->unique()->random()->id;
        $students->academic_year ='2023';
        $students->save();
    }
}
