<?php

namespace App\Listeners;

use App\Events\UserCEvent as UserSavingEvent;

class UserCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCEvent $event
     * @return mixed
     */
    public function handle(UserSavingEvent $event)
    {
        return file_put_contents('index.txt', json_encode($event->getUser()) . PHP_EOL, FILE_APPEND);
    }
}