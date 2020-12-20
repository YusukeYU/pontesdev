<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{   
    protected $model = Client::class;
 
    public function definition()
    {
        return [
            'name_client' => $this->faker->name,
            'email_client' => $this->faker->unique()->safeEmail,
            'phone_client' => Str::random(14),
            'cpf_client' => Str::random(14),
        ];
    }
}
