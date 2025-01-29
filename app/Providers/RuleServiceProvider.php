<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->bind(\App\Rules\Contracts\UserRuleInterface::class, \App\Rules\Concrete\UserRule::class);
    }
}
