<?php

namespace App\Listeners;

use App\Events\Complaint;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendComplaintNotification
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
    public function handle(Complaint $event): void
    {
        // Complaint::class
    }
}
