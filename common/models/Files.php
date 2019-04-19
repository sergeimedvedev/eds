<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "files".
 *
 * @property string $id Идентификатор файла
 * @property string $path Путь к файлу на сервере
 * @property string $filename Имя файла
 * @property string $extension Расширение файла
 */
class Files extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['path', 'filename', 'extension'], 'required'],
            [['path', 'filename'], 'string'],
            [['extension'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор файла'),
            'path' => Yii::t('app', 'Путь к файлу на сервере'),
            'filename' => Yii::t('app', 'Имя файла'),
            'extension' => Yii::t('app', 'Расширение файла'),
        ];
    }
}
