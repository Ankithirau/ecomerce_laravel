<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use faker\Factory as faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 $this->call(kingSeeder::class);
       // $this->call('UsersTableSeeder');
    }
}
?>