<?php

namespace App\Listeners;

use App\Competitor;
use App\Mail\RegattaDeletedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailToCompetitorsListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // foreach($event->regatta->competitor as $competitor) {
        //     Mail::to($competitor->email)->send(new RegattaDeletedMail());
        // }
    }
}
