<?php

namespace JaviManga\InitDB;

use JaviManga\InitDB\Console\Commands\CloneDB;
use JaviManga\InitDB\Console\Commands\CreateDB;
use JaviManga\InitDB\Console\Commands\DropDB;
use JaviManga\InitDB\Console\Commands\InitDB;
use Illuminate\Support\ServiceProvider;

class InitDBServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CLoneDB::class,
                CreateDB::class,
                DropDB::class,
                InitDB::class,
            ]);
        }
    }
}
