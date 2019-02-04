<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Class FileUploadForm
 * @package app\models
 */
class FileUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $importFile;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['importFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'txt, csv'],
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->importFile->saveAs('uploads/' . $this->importFile->baseName . '.' . $this->importFile->extension);

            return true;
        } else {
            return false;
        }
    }
}
