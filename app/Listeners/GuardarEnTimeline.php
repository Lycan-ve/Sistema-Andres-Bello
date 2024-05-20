<?php

namespace App\Listeners;

use App\Events\Libro;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GuardarEnTimeline
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Libro $event): void
    {
        $fecha = date('y-m-d');

        $proceso = $event->proceso;

        $libro = $event->libro;

        $timeline = new Timeline();
    $timeline->fecha = $fecha;
    $timeline->proceso = $proceso;
    $timeline->libro_id = $libro->id;
    $timeline->save();
    }
}
