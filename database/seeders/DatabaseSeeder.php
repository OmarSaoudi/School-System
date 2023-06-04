<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitiesTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        //$this->call(GradeTableSeeder::class);
        //$this->call(ClassroomTableSeeder::class);
        //$this->call(SectionTableSeeder::class);
        $this->call(MyparentTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        //$this->call(StudentTableSeeder::class);
        $this->call(SettingSeeder::class);
    }
}

