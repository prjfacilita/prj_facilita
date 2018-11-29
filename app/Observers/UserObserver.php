<?php


namespace App\Observers;

use App\Jobs\SendWelcomeEmail;
use App\Login;
//use App\Models\Login;

class UserObserver
{
    /**
     * Handle to the user "created" event.
     *
     * @param  \App\Login  $user
     * @return void
     */
    public function created(Login $user)
    {
        // Dispatching Job SendWelcomeEmail
        SendWelcomeEmail::dispatch($user);
    }

    // [...]
}