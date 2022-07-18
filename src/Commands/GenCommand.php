<?php

namespace Lynrantictz\LaravelOrganization\Commands;

use Illuminate\Console\Command;
use Lynrantictz\LaravelOrganization\Services\InitService;

class GenCommand extends Command
{
    use InitService;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'og:gen {Model} {--path=?} {--A|a} {--R|r} {--ar|AR} {--V|v} {C|c}{R|r}{V|v}';

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
        
    }
}
