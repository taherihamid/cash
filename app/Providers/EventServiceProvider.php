<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\Registered as SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
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
    ];

    /**
     * Register any events for your application.
     *
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        $this->registerEventsAndListeners();
    }

    protected function registerEventsAndListeners()
  {
    $eventsDir = app_path('Events');

    foreach (glob("$eventsDir/*.php") as $filename) {
      $eventClassName = basename($filename, ".php");

      Event::listen('App\Events\\' . $eventClassName, 'App\Listeners\\' . $eventClassName);
    }
  }
}
