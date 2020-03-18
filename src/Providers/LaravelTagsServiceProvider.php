<?php

namespace Melogail\LaravelReviews\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelTagsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__ . '/../database/migrations/create_tags_table.php' => $this->app->databasePath("/migrations/{$timestamp}_create_tags_table.php"),
            __DIR__ . '/../database/migrations/create_taggables_table.php' => $this->app->databasePath("/migrations/{$timestamp}_create_taggables_table.php"),
            __DIR__ . '/../config/laravel-tags.php' => config_path('laravel-tags.php'),
        ], 'data');

        Relation::morphMap([
            config('laravel-tags.models.classes')
        ]);
    }
}