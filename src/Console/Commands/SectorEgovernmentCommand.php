<?php namespace Bantenprov\SectorEgovernment\Console\Commands;

use Illuminate\Console\Command;

/**
 * The SectorEgovernmentCommand class.
 *
 * @package Bantenprov\SectorEgovernment
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class SectorEgovernmentCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:sector-egovernment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\SectorEgovernment package';

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
        $this->info('Welcome to command for Bantenprov\SectorEgovernment package');
    }
}
