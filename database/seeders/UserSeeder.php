<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Omar Saoudi',
            'email' => 'saoudiomar518@gmail.com',
            'email_verified_at'=> date("Y-m-d h:i:s"),
            'created_at' => Carbon::now(),
            'password' => Hash::make('1'),
        ]);
    }
}
