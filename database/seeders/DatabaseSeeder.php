<?php

namespace Database\Seeders;

use App\Models\JobListings;
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
         \App\Models\User::factory(5)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

         JobListings::create(
             [
                 'title' => 'Senior Laravel Developer',
                 'tags' => 'laravel, backend, api',
                 'company_name' => 'Acme Corp',
                 'job_id'=>'SLDB',
                 'location' => 'Boston, MA',
                 'email' => 'acmeemail1@email.com',
                 'name_of_team'=>'platform',
                 'website' => 'https://www.acme.com',
                 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
             ]
         );

         JobListings::create(
             [
                 'title' => 'Full-Stack Engineer',
                 'job_id'=>'FSEA',
                 'company_name' => 'Stark Industries',
                 'location' => 'Accra, GH',
                 'tags' => 'Node.js, javascript,api',
                 'email' => 'starkemail2@email.com',
                 'name_of_team'=>'platform',
                 'website' => 'https://www.starkindustries.com',
                 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
             ]
         );

         JobListings::create(
             [
                 'title' => 'DevOps Engineer',
                 'job_id'=>'DECM',
                 'tags' => 'gcp, aws, azure, grafana, ci/cd, python',
                 'location' => 'Central City, Mars',
                 'company_name' => 'Flash Enterprises',
                 'name_of_team'=>'infrastructure',
                 'email' => 'flashemail3@email.com',
                 'website' => 'https://www.flashenterprises.com',
                 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
             ],
         );

         JobListings::create(
             [
                 'title' => 'Java Backend Developer',
                 'job_id'=>'BDN',
                 'tags' => 'springboot, java, api',
                 'location' => 'Lagos, NG',
                 'company_name' => 'Skynet Systems',
                 'name_of_team'=>'platform',
                 'email' => 'skynetemail4@email.com',
                 'website' => 'https://www.skynet.com',
                 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
             ],
         );

    }
}
