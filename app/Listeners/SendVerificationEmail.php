<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\UserRegistration;

class SendVerificationEmail
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
     * @param UserRegistration $userRegistration
     * @return void
     */
    public function handle(UserRegistration $userRegistration)
    {
        //
    }
}
