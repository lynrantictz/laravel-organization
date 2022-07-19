<?php

namespace Lynrantictz\LaravelOrganization\Services;

use Exception;
use Illuminate\Support\Facades\File;

trait GenService
{
    protected $model_namespace = 'App\Models';

    private function model(array $option = [])
    {
        if (!class_exists($option['model'])) {
            File::makeDirectory(app_path('Models/' . $option['model']), 0777, true, true);
            File::copy(__DIR__ . '/../Templates/Model.php', app_path('Models/' . $option['model'] . '/' . $option['model'] . '.php'));
            $current_model_path = app_path('Models/' . $option['model'] . '/' . $option['model'] . '.php');
            $this->replace_in_file($current_model_path, '//namespace','namespace App\Models\\'.$option['model']);
            $this->replace_in_file($current_model_path, 'ModelName',$option['model']);
            if(isset($option['no_base_model'])){
                $this->replace_in_file($current_model_path, '//model','use Illuminate\Database\Eloquent\Model');
                $this->replace_in_file($current_model_path, 'ModelExtension','Model');
            }else{
                $this->replace_in_file($current_model_path, '//model','use App\Models\BaseModel');
                $this->replace_in_file($current_model_path, 'ModelExtension','BaseModel');
            }
            return app_path('Models/' . $option['model'] . '/' . $option['model'] . '.php');
        }
    }

    /**
     * Replaces a string in a file
     *
     * @param string $FilePath
     * @param string $OldText text to be replaced
     * @param string $NewText new text
     * @return array $Result status (success | error) & message (file exist, file permissions)
     */
    function replace_in_file($FilePath, $OldText, $NewText)
    {
        $Result = array('status' => false, 'message' => '');
        if (file_exists($FilePath) === TRUE) {
            if (is_writeable($FilePath)) {
                try {
                    $FileContent = file_get_contents($FilePath);
                    $FileContent = str_replace($OldText, $NewText, $FileContent);
                    if (file_put_contents($FilePath, $FileContent) > 0) {
                        $Result["status"] = true;
                    } else {
                        $Result["message"] = 'Error while writing file';
                    }
                } catch (Exception $e) {
                    $Result["message"] = 'Error : ' . $e;
                }
            } else {
                $Result["message"] = 'File ' . $FilePath . ' is not writable !';
            }
        } else {
            $Result["message"] = 'File ' . $FilePath . ' does not exist !';
        }
        return $Result;
    }

}
