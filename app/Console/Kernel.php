<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \JumpGate\Core\Console\Commands\Service\ServiceMakeCommand::class,
        \JumpGate\Core\Console\Commands\Service\ServiceListCommand::class,
        \JumpGate\Core\Console\Commands\Service\ServiceScaffoldCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $filePath = storage_path('logs/cronlog');
        // $schedule->command('inspire')
        //          ->hourly()
        //          ->sendOutputTo($filePath);
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // $this->command('build {project}', function ($project) {
        //     $this->info('Building project...');
        // });
    }
}
