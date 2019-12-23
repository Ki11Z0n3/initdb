<?php

namespace JaviManga\InitDB\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class CreateDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear base de datos';

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
            Artisan::call('config:clear');
            if($this->argument('name')){
                $database = $this->argument('name');
                $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));
                $pdo->exec('CREATE DATABASE IF NOT EXISTS ' . $database);
            }else{
                $database = env('DB_DATABASE');
                $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));
                $pdo->exec('CREATE DATABASE IF NOT EXISTS ' . $database);
            }
            $this->info('Se ha creado la base de datos ' . $database);
        } catch (\Exception $e) {
            $this->error('Error al crear la base de datos: ' . $database . ' / ' . $e->getMessage());
        }
    }

    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
