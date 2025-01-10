<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'App\Events\SendEmailEvent' => [
            'App\Listeners\SendEmailListener',
        ],
    ];

    public function boot()
    {
        parent::boot();

    }
}
