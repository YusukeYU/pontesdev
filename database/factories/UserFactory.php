<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_user' => $this->faker->name,
            'email_user' => $this->faker->unique()->safeEmail,
            'password_user' => bcrypt('1234'), // password
            'admin_user' => 0,
            'photo_user' => 'default.png'
        ];
    }
}
