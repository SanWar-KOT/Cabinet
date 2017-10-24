<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use app\models\FileTransfer;
/**
 * This is the model class for table "file".
 *
 * @property string $type
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
    * @property integer $type
     */
    public $imageFiles, $type_file, $student, $predmet;

    public function rules()
    {
        return [
          //  [['type'], 'required'],
            [['type_file'], 'integer'],
            [['student', 'predmet'], 'string', 'max' => 200],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'maxFiles' => 4],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
             
                $file_record = new FileTransfer();
                $file_record->type = $this->type_file;
                $file_record->name = $file->baseName.'.'.$file->extension;
                $file_record->predmet = $this->predmet;
                $file_record->student = $this->student;
                $file_record->save();
                
                $file->saveAs('user_files/' .$file_record->id . $file->baseName . '.' . $file->extension);
              
                
            }
            return true;
        } else {
            return false;
        }
    }
    
     public function attributeLabels()
    {
        return [
            'imageFiles' => 'Файлы для загрузки',
            'type_file' => 'Тип файлов:'
        ];
    }
}
?>