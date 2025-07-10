<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class DropDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:drop-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $databaseName = config('database.connections.mysql.database');

        DB::statement("DROP DATABASE IF EXISTS `$databaseName`");
        $this->info("Database `$databaseName` dropped successfully.");

        // Optional: Recreate it
        DB::statement("CREATE DATABASE `$databaseName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
        $this->info("Database `$databaseName` created again.");
    }
}
