<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_lead' => $this->faker->name,
            'email_lead' => $this->faker->unique()->safeEmail,
            'phone_lead' => Str::random(15),
            'msg_lead' => Str::random(15)
        ];
    }
}
