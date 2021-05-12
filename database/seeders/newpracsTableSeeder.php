<?php

namespace Database\Seeders;
use App\Models\newprac;
use Illuminate\Database\Seeder;

class newpracsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $products = factory(newprac::class, 10)->create();
    }
}
