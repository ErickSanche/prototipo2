<?php

namespace App\Providers;

use App\Events\EventEmail;
use App\Listeners\ListenerEmail;
use App\Models\Registro;
use App\Models\Evento;
use App\Observers\ObserverRegistro;
use App\Observers\ObserverEvento;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        EventEmail::class => [
            ListenerEmail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Registro::observe(ObserverRegistro::class);
        Evento::observe(ObserverEvento::class);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
