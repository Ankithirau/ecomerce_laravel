<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\king;
use Illuminate\Database\Eloquent\Factories\Factory;

class KingFactory extends Factory
{
    protected $model = king::class;

    public function definition(): array
    {
    	return [
    	  'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'mobile' => '8770310131', 
        	'api_token' => Str::random(40),
    	];
    }
}
