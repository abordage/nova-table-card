<?php

declare(strict_types=1);

namespace Abordage\TableCard;

use Abordage\TableCard\Console\CardCommand;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class CardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('abordage-table-card', __DIR__ . '/../dist/js/card.js');
        });

        if ($this->app->runningInConsole()) {
            $this->commands([CardCommand::class]);
        }
    }
}
