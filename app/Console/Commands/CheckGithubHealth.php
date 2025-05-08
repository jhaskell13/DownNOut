<?php

namespace App\Console\Commands;

use App\Services\ServiceCheckers\GithubServiceChecker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CheckGithubHealth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'services:check-github-health';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = app(GithubServiceChecker::class)->check();

            if ($response) {
                $this->info('Successfully checked Github services.');
            } else {
                $this->error("There was an issue trying to check Github services: [{$response}]");
            }
        } catch (\Exception $e) {
            $this->error("Error requesting github status: [{$e->getMessage()}]");
        }
    }
}
