<?php

namespace Lynrantictz\LaravelOrganization\Services;

trait Generator
{
    /**
     * Generate Folders for Models and Repository
     */
    public function initiate()
    {
        //check if Models folder exist
        

        //Check if Repository folder exist
    }

    public function publishBaseModel()
    {
        $this->publishes([ __DIR__.'/../Templates/BaseModel.php' => public_path('App/Models'), ], 'public');
    }

    public function publishBaseRepository()
    {
        $this->publishes([ __DIR__.'/../Templates/BaseRepository.php' => public_path('App/Models'), ], 'public');
    }


}