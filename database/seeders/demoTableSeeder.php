<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class demoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $products = factory(king::class, 10)->create();
    }
}
