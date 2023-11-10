<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\DeleteExpired::class, // Ganti dengan nama tugas penjadwalan yang sesuai
    ];
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('app:delete-expired')->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
