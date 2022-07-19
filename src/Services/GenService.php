<?php

namespace Lynrantictz\LaravelOrganization\Services;

use Illuminate\Support\Facades\File;

trait GenService
{
    protected $model_namespace='App\Models';

    private function model(array $option = [])
    {
        if (!class_exists($option['model'])) {
            File::makeDirectory(app_path('Models/'.$option['model']), 0777, true, true);
            File::copy(__DIR__ . '/../Templates/Model.php', app_path('Models/'.$option['model'].'/'.$option['model'].'.php'));
            return app_path('Models/'.$option['model'].'/'.$option['model'].'.php');
        }
    }

}
