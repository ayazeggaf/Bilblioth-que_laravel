<?php

namespace App\Listeners;

use App\Events\LivreModifie;
use App\Models\HistoriqueLivre;
use App\Models\Livre;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LivreModifieListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\LivreModifie  $event
     * @return void
     */
    public function handle(LivreModifie $event)
    {
        $historique = new HistoriqueLivre();
        $historique->livre_id = $event->livreId;
        $historique->user_id = $event->userId;
        $historique->message = $event->message;
        $historique->save();
    }
}
