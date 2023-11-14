<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('app:delete-expired')->everyTenMinutes();
        // $schedule->command('app:update-lab-status')->dailyAt('14:10.0');
        $schedule->command('app:switch-status-daily')->dailyAt('05:0.0');
        $schedule->command('app:update-lab-status-today')->everyFiveMinutes();
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
