<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class kingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('kings')->insert([
       		'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'mobile'=>rand(9050361100,10000000000),
            'password' => Hash::make('password'),
            'api_token'=>bcrypt('secret')
       ]);
    }
}
