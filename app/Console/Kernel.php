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
        Commands\getWeather::class,
        '\App\Console\Commands\getWeather', //to nasza nowa komenda 

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('log:cron')
        //          ->everyMinute();
                //  $schedule->call(function () {
                //   dd('hej');
                // })->daily();   
        $schedule->command('getWeather:current') // i od teraz chcemy, żeby
        ->everyThirtyMinutes() // była uruchamina co 30 minut
        ->appendOutputTo('/var/log/scheduled_weather.log'); //a komunikaty zapisywała w pliku dziennika;  
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
