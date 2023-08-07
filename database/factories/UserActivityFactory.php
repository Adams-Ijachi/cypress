<?php

namespace Database\Factories;

use App\Models\UserActivity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserActivityFactory extends Factory
{
    protected $model = UserActivity::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->word(),
            'global_activity_id' => $this->faker->word(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'image' => $this->faker->word(),
            'is_global' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
