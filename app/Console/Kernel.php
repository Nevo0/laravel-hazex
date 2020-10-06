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
        //
        // Commands\LogCron::class,
        // Commands\getWeather::class,
        '\App\Console\Commands\getWeather',
        '\App\Console\Commands\DailyQuote',
        '\App\Console\Commands\LogCron',
        // Commands\DailyQuote::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('jobexp:warning')->cron('* * * * *');
        $schedule->command('quote:daily')
            ->everyMinute();
        $schedule->command('getWeather:current')
            ->everyMinute();
        $schedule->command('log:cron')
            ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
