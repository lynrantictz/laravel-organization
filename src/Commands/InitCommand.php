<?php

namespace Lynrantictz\LaravelOrganization\Commands;

use Illuminate\Console\Command;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'og:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a BaseModel.php and BaseRepository.php files in Models and repository root folder';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Organization Initialization');
        $this->line('Generating files...');
        $this->line('App\Models\BaseModel.php');
        $this->line('App\Repository\BaseRepository.php');
        $this->info('Initalization completed successfully');
    }
}
