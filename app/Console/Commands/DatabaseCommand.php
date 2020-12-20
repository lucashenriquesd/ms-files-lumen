<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use DB;

class DatabaseCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create the database to work on";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        DB::statement('CREATE DATABASE vagaspub');
    }
}