<?php

namespace Database\Factories;

use App\Models\Section;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->unique()->name,
            'description' => $this->faker->paragraph,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function type($type)
    {
        return $this->state(function (array $attributes) use ($type) {
            return [
                'type' => $type,
            ];
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function ($entity) {
            switch ($entity->type) {
                case 'welcome-section':
                    $entity->services()->create([
                        'section_id'    => $entity->id,
                        'itemable_type' => 'App\Models\Service',
                        'itemable_id'   => Service::factory()->create()->id
                    ]);
                    break;
            }
        });
    }

}
