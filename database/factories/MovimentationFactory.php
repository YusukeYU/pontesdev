<?php

namespace Database\Factories;

use App\Models\Movimentation;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovimentationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movimentation::class;

    public function definition()
    {
        return [
            'type_movimentation' => 1,
            'value_movimentation' => 1,
            'description_movimentation' =>'Movimentações para teste.',
        ];
    }
}
