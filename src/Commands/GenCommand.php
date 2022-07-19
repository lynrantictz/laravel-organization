<?php

namespace Lynrantictz\LaravelOrganization\Commands;

use Illuminate\Console\Command;
use Lynrantictz\LaravelOrganization\Services\GenService;

class GenCommand extends Command
{
    use GenService;
    /**
     * The name and signature of the console command.
     *  {--path=?} {--A|a} {--R|r} {--ar|AR} {--V|v} {C|c}{R|r}{V|v}
     * @var string
     */
    protected $signature = 'og:gen {ModelName} {--no-base-model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a model --A|a Attribute --R|r Relationship C|c Controller R|r Route V|v Views';

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
        if($this->argument('ModelName')){
            $model_path = $this->model(['model' => $this->argument('ModelName')]);
            $this->info(app_path($model_path));
        }

        if($this->argument('ModelName') && $this->option('no-base-model')){
            $model_path = $this->model(['model' => $this->argument('ModelName'), 'no_base_model' => $this->option('no-base-model')]);
            $this->info(app_path($model_path));
        }
    }
}
