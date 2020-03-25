<?php
/**
 * Author: Mohamed Elogail
 * Email: moh.elogail@gmail.com
 * Version: 1.0.0
 * Licence: MIT
 * Description: Laravel Tags service provider file
 *
 * Date: 3/18/2020
 * Time: 6:16 PM
 */
namespace Melogail\LaravelTags\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        /*
         * Any code must be added directly after this comment line
         */

        
        // Don't add any code after this section
        // check if tables migrations already exist
        $migration_files = array_diff(scandir(database_path('/migrations')), ['..', '.']);

        foreach ($migration_files as $file) {
            if (strpos($file, 'create_tags_table') == true || strpos($file, 'create_taggables_table') == true) {
                exit();
            }
        }

        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__ . '/../database/migrations/create_tags_table.php' => $this->app->databasePath("/migrations/{$timestamp}_create_tags_table.php"),
            __DIR__ . '/../database/migrations/create_taggables_table.php' => $this->app->databasePath("/migrations/{$timestamp}_create_taggables_table.php"),
            __DIR__ . '/../config/laravel-tags.php' => config_path('laravel-tags.php'),
        ], 'tags_data');

    }
}