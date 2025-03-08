<?php

namespace App\Commands;

//use App\Commands\Command;
use Illuminate\Console\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Support\Facades\Log;
use App\User;
class AlerAdmon extends Command implements SelfHandling
{
    /**
     * Create a new command instance.
     *Ejecutar regla/condicion
     Ejecutar condicion envio
     * @return void
     */
     protected $signature = 'usr';
     protected $description = 'Alertas administrador';
    public function __construct()
    {
        //
        parent::__construct();
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        //
        $user=User::select('name')->where('created_at','>','2017-01-01')->get();
        Log::info('Alerta de sistema USUARIO SINCRONIZACION: '.$user);

    }
}
