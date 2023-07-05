<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Myparent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Models\Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MyparentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('myparents')->delete();
        $myparents = new Myparent();
        $myparents->email = 'saoudiomar518@gmail.com';
        $myparents->password = Hash::make('1');
        $myparents->name_father = ['en' => 'Saoudi', 'ar' => 'سعودي'];
        $myparents->national_id_father = '213555555555';
        $myparents->passport_id_father = '213666666666';
        $myparents->phone_father = '0550599880';
        $myparents->job_father = ['en' => 'University', 'ar' => 'استاذ'];
        $myparents->address_father ='Msila';
        $myparents->nationalitie_father_id = Nationalitie::all()->unique()->random()->id;
        $myparents->blood_father_id =Blood::all()->unique()->random()->id;
        $myparents->religion_father_id = Religion::all()->unique()->random()->id;

        $myparents->name_mother = ['en' => 'Abdelaziz', 'ar' => 'عبد العزيز'];
        $myparents->national_id_mother = '213666666666';
        $myparents->passport_id_mother = '213666666666';
        $myparents->phone_mother = '0657686295';
        $myparents->job_mother = ['en' => 'house', 'ar' => 'house'];
        $myparents->address_mother ='المطارفة';
        $myparents->nationalitie_mother_id = Nationalitie::all()->unique()->random()->id;
        $myparents->blood_mother_id = Blood::all()->unique()->random()->id;
        $myparents->religion_mother_id = Religion::all()->unique()->random()->id;
        $myparents->save();
    }
}
