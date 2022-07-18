<?php

namespace Lynrantictz\LaravelOrganization\Commands;

use Illuminate\Console\Command;
use Lynrantictz\LaravelOrganization\Services\Generator;

class InitCommand extends Command
{
    use Generator;
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
        if (
            !file_exists(app_path('Models')) || 
            !file_exists(app_path('Repositories')) || 
            !file_exists(app_path('Models/BaseModel.php')) ||
            !file_exists(app_path('Repositories/BaseRepository.php'))
            ) {
                $this->initiate();
        }else{
            $this->warn('Sorry!, Your have already run the command');
        }
    }
}
