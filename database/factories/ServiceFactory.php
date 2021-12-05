<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

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
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Service $entity) {
            // $entity->clients()->create([
            //     "client_id"  => Client::factory()->create(),
            //     "service_id" => $entity->id
            // ]);
            // $entity->portfolios()->sync(Portfolio::factory(2)->create());
        });
    }

}
