<?php

namespace Database\Seeders;

use App\Console\Commands\GigsCron;
use App\Http\Controllers\ListingController;
use App\Models\JobListings;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //\App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Kwame Yaw',
            'email' => 'kwameyaw@myemail.com',
        ]);

        /*    \App\Models\User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]); */











}}

