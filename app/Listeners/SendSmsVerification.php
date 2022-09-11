<?php

namespace App\Listeners;

use App\Events\PhoneVerification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSmsVerification
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
     * @param  PhoneVerification  $event
     * @return void
     */
    public function handle(PhoneVerification $event)
    {
        
    }
}
