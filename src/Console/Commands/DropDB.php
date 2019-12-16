<?php

namespace JaviManga\InitDB\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use PDO;
use PDOException;

class DropDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:drop {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Borrar base de datos';

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
        Artisan::call('config:clear');
        try {
            if($this->argument('name')){
                $database = $this->argument('name');
                $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));
                $pdo->exec('DROP DATABASE IF EXISTS ' . $database);
            }else{
                $database = env('DB_DATABASE');
                $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));
                $pdo->exec('DROP DATABASE IF EXISTS ' . $database);
            }
            $this->info('Se ha borrado la base de datos ' . $database);
        } catch (PDOException $exception) {
            $this->error('Error al borrar la base de datos: ' . $database . ' / ' . $exception->getMessage());
        }
    }

    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
