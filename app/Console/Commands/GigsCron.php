<?php

namespace App\Console\Commands;

use App\Models\JobListings;
use App\Models\User;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Http;

class GigsCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gigs:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make hourly api call to retrieve jobs';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $externalCall =  Http::get('https://remotive.com/api/remote-jobs?category=software-dev&limit=50')
            ->json()['jobs'];

        foreach ($externalCall as $job) {
            $user = User::factory()->create();
            $apiJobs = [
                'title' => $job['title'],
                'user_id' => $user->id,
                'job_id' => $job['id'],
                'description' => $job['category'].' job'.' at '.$job['company_name'],
                'company_name' => $job['company_name'],
                'location' => $job['candidate_required_location'],
                'website' => $job['url'],
                'name_of_team' => $job['category'],
                'email' => $job['url'],
                'tags' => $job['tags'][5],

            ];
            JobListings::create($apiJobs);
        }



    }
}



