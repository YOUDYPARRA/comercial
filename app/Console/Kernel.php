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
        \App\Console\Commands\Inspire::class,
        \App\Commands\AlerContratoConcreto::class,
        \App\Commands\AlerEquipoContrato::class,
        \App\Commands\AlerContratoVencer::class,
        \App\Commands\AlerContratoEnviado::class,
        \App\Commands\AlerAdmon::class,
        \App\Commands\AvisoEsperaReporte::class,
        \App\Commands\AvisoProgramaciones::class,
        \App\Commands\Notificacion::class,
        \App\Commands\CommandPrueba::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->everyMinute();
        //$x=$schedule->command('usr')->hourly();
        $schedule->command('reportes')->dailyAt('07:00');
        $schedule->command('contratoconcreto')->dailyAt('15:30');
        $schedule->command('equipocontratoproximo')->dailyAt('15:30');
        $schedule->command('contratovencer')->dailyAt('16:00');
        $schedule->command('contratoenviado')->dailyAt('10:00');
        $schedule->command('programaciones')->dailyAt('16:30');
    }
}
