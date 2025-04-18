<?php

namespace Database\Factories;

use App\Models\WeightLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    protected $model = WeightLog::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // または固定ユーザーにしたい場合はSeederで上書き
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 40, 100),
            'calories' => $this->faker->numberBetween(1200, 2500),
            'exercise_time' => $this->faker->numberBetween(10, 180),
            'exercise_content' => $this->faker->sentence(3),
        ];
    }
}
