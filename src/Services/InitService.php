<?php

namespace Lynrantictz\LaravelOrganization\Services;

use Illuminate\Support\Facades\File;

trait InitService
{

    public function initiate()
    {
        $this->info('Organization Initialization');
        $this->line('Generating Files...');
        $this->createModelsFolder();
        $this->publishBaseModel();
        $this->line('App\Models\BaseModel.php');
        $this->createRepositoriesFolder();
        $this->line('App\Repository\BaseRepository.php');
        $this->publishBaseRepository();
        $this->info('Initalization completed successfully');
    }

    public function createModelsFolder()
    {
        if (!file_exists(app_path('Models'))) {
            File::makeDirectory(app_path('Models'), 0777, true, true);
        }
    }

    public function createRepositoriesFolder()
    {
        if (!file_exists(app_path('Repositories'))) {
            File::makeDirectory(app_path('Repositories'), 0777, true, true);
        }
    }

    private function publishBaseModel()
    {
        if (!file_exists(app_path('Models/BaseModel.php'))) {
            File::copy(__DIR__ . '/../Templates/BaseModel.php', app_path('Models/BaseModel.php'));
        }
    }

    private function publishBaseRepository()
    {
        if (!file_exists(app_path('Repositories/BaseRepository.php'))) {
            File::copy(__DIR__ . '/../Templates/BaseRepository.php', app_path('Repositories/BaseRepository.php'));
        }
    }
}
