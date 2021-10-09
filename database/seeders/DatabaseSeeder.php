<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ResetDBSeeder::class,
        ]);

        \App\Models\User::factory(1)->unverified()->create([
            'name'     => 'admin',
            'email'    => 'admin@sg-egypt.com',
            'password' => \Hash::make('12345678')
        ]);
        \App\Models\Section::factory(1)->type('welcome-section')->create([
            'name' => 'welcome-section'
        ]);
        \App\Models\Section::factory(1)->type('coupon-section')->create([
            'name' => 'coupon-section'
        ]);
        \App\Models\Section::factory(1)->type('story-section')->create([
            'name' => 'story-section'
        ]);
        \App\Models\Section::factory(1)->type('service-section')->create([
            'name' => 'service-section'
        ]);
        \App\Models\Section::factory(1)->type('portfolio-section')->create([
            'name' => 'portfolio-section'
        ]);

        \App\Models\Client::factory(5)->create();
        \App\Models\Portfolio::factory(5)->create();
        \App\Models\Service::factory(5)->create();

    }
}
