<?php

namespace Database\Factories;

use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => [
                'en' => $this->faker->unique()->name,
                'ar' => $this->faker->unique()->name,
            ],
            'description' => [
                'en' => $this->faker->paragraph,
                'ar' => $this->faker->paragraph,
            ],
            'category'    => $this->faker->name,
            'location'    => $this->faker->secondaryAddress(),
        ];
    }
}
