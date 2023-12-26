<?php

namespace App\Providers;

use App\Contracts\Ticket\TicketInterface;
use App\Contracts\User\UserInterface;
use App\Services\TicketService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(TicketInterface::class, TicketService::class);
        $this->app->bind(UserInterface::class, UserService::class);
    }
}
