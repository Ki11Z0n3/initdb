<?php

namespace JaviManga\InitDB\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use PDO;
use PDOException;

class CloneDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:clone {new_name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clonar base de datos';

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
        try{
            Artisan::call('config:clear');
            $database = env('DB_DATABASE');
            $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));
            $pdo->exec('CREATE DATABASE IF NOT EXISTS ' . ($this->argument('new_name')) ? $this->argument('new_name') : $database . '_copy');
            $result = $pdo->query('SELECT TABLE_NAME AS name FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = \'' . $database . '\'');
            foreach ($result->fetchAll() as $table) {
                $pdo->exec('USE ' . $this->argument('new_name'));
                $pdo->exec('CREATE TABLE ' . $table['name'] . ' SELECT * FROM ' . $database . '.' . $table['name']);
            }
        } catch (\Exception $e) {
            $this->error('Error al clonar la base de datos: ' . $database . ' / ' . $e->getMessage());
        }
    }

    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
