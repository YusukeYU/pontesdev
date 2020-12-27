<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    public function definition()
    {
        return [
            'name_task' => $this->faker->name,
            'description_task' => Str::random(50),
            'status_task' => 0,
        ];
    }
}
