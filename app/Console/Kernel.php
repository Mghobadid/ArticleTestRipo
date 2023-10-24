<?php

namespace App\Console;

use App\Console\Commands\UpdateCryptocurrencyDataCommand;
use App\Jobs\UpdateCoinInfoJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        /**
         * ------------------------- config schedule timing -------------------------
         *         https://laravel.com/docs/10.x/scheduling#schedule-frequency-options
         * you should  use https://laravel.com/docs/10.x/queues#supervisor-configuration
         * you config https://laravel.com/docs/10.x/scheduling#running-the-scheduler
         */

        $schedule->command(UpdateCryptocurrencyDataCommand::class)
            ->withoutOverlapping()
            ->runInBackground()
            ->daily()
            ->then(function () {
                dispatch(new UpdateCoinInfoJob());
            });

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
