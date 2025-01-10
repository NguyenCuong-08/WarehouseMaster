<?php

namespace App\Console;

use App\Console\Commands\BackUpDB;
use App\Models\Setting;
use Closure;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
       \App\Console\Commands\CrawlProduct::class,
//        \App\Console\Commands\UpdateProduct::class,
//        \App\Console\Commands\Test::class,
        BackUpDB::class
    ];

    protected function schedule(Schedule $schedule)
    {
        \Eventy::action('schedule.run', $schedule);
        $settings = Setting::where('type', 'backup_database')->pluck('value', 'name')->toArray();
        if (@$settings['status'] == 1) {
            $cron = @$settings['minute_backup'] . ' ' . @$settings['hour_backup'] . ' ' . @$settings['day_in_month_backup'] . ' ' . @$settings['month_backup'] . ' ' . @$settings['day_in_week_backup'];
            $schedule->command('backup:database')->cron($cron);
        }
        $schedule->command('admin:check-and-update-status')->everyMinute();
    }


    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
