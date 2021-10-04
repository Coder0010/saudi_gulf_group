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
        \App\Models\User::truncate();
        \App\Models\User::factory(1)->unverified()->create([
            'name'     => 'admin',
            'email'    => 'admin@sg-egypt.com',
            'password' => \Hash::make('12345678')
        ]);
    }
}
