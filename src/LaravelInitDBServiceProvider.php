<?php

namespace JaviManga\InitDB;

use App\Console\Commands\CloneDB;
use App\Console\Commands\CreateDB;
use App\Console\Commands\DropDB;
use App\Console\Commands\InitDB;
use Illuminate\Support\ServiceProvider;

class LaravelInitDBServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'httpResponses');
//        $this->publishes([
//            __DIR__ . '/../resources/lang' => resource_path('lang/en'),
//        ], 'laravelabstractclass');
        if ($this->app->runningInConsole()) {
            $this->commands([
                CLoneDB::class,
                CreateDB::class,
                DropDB::class,
                InitDB::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        include __DIR__ . '/routes/api.php';
    }
}
