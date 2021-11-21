<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Lib\Contracts\Events\AuditableEvent;

class LogAuditableEvent
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
     * @param AuditableEvent $event
     * @return void
     */
    public function handle(AuditableEvent $event)
    {
        //
    }
}
