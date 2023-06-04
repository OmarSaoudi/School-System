<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->delete();
        $teachers = new Teacher();
        $teachers->name = ['ar' => 'عمر سعودي', 'en' => 'Omar Saoudi'];
        $teachers->email = 'saoudiomar518@gmail.com';
        $teachers->password = Hash::make('1');
        $teachers->address = 'حي تعاونية الامير عبد القادر';
        $teachers->joining_date = date("Y-m-d h:i:s");
        $teachers->specialization_id = Specialization::all()->unique()->random()->id;
        $teachers->gender_id = Gender::all()->unique()->random()->id;
        $teachers->save();
    }
}
