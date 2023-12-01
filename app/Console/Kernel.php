<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('api:product-data-command')
        ->weekly()
        ->mondays() // Haftalık olarak Pazartesi günü çalışacak
        ->withoutOverlapping() // Aynı görevin önceki çalışmasının tamamlanmasını bekler
        ->onOneServer(); // Sadece bir sunucuda çalışmasını sağlar

    $schedule->command('api:offer-data-command')
        ->weekly()
        ->tuesdays() // Haftalık olarak Salı günü çalışacak
        ->withoutOverlapping()
        ->onOneServer();

    $schedule->command('api:order-data-command')
        ->weekly()
        ->wednesdays() // Haftalık olarak Çarşamba günü çalışacak
        ->withoutOverlapping()
        ->onOneServer();

    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
