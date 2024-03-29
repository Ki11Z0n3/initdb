<?php

namespace JaviManga\InitDB\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class InitDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:init {seed?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Iniciar base de datos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->call('database:create');
            $this->call('migrate');
            if ($this->argument('seed') && $this->argument('seed') == 'seed') {
                $this->call('db:seed', ['--class' => 'DatabaseSeeder']);
            }
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}
