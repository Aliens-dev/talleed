<?php

namespace App\Providers;

use App\Events\ContactMessageSent;
use App\Events\UserDisabledEvent;
use App\Events\UserRegistered;
use App\Events\UserVerifiedEvent;
use App\Listeners\ContactMessageSentListener;
use App\Listeners\UserDisabledListener;
use App\Listeners\UserRegisteredListener;
use App\Listeners\UserVerifiedListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        UserRegistered::class => [
            UserRegisteredListener::class
        ],
        ContactMessageSent::class=> [
            ContactMessageSentListener::class
        ],
        UserVerifiedEvent::class => [
            UserVerifiedListener::class,
        ],
        UserDisabledEvent::class => [
            UserDisabledListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
