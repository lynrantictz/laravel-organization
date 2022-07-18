<?php

namespace Lynrantictz\LaravelOrganization\Services;

use Illuminate\Support\Facades\File;

trait Generator
{
    /**
     * Generate Folders for Models and Repository
     */
    public function initiate()
    {
        if (!file_exists(app_path('Models'))) {
            File::makeDirectory(app_path('Models'), 0777, true, true);
        }

        if (!file_exists(app_path('Models/BaseModel.php'))) {
            $this->publishBaseModel();
        }

        if (!file_exists(app_path('Repositories'))) {
            File::makeDirectory(app_path('Repositories'), 0777, true, true);
        }

        if (!file_exists(app_path('Repositories/BaseRepository.php'))) {
            $this->publishBaseRepository();
        }

    }

    private function publishBaseModel()
    {
        File::copy(__DIR__.'/../Templates/BaseModel.php', app_path('Models/BaseModel.php'));
    }

    private function publishBaseRepository()
    {
        File::copy(__DIR__.'/../Templates/BaseRepository.php', app_path('Repositories/BaseRepository.php'));
    }


}