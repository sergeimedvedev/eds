<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document_form_params".
 *
 * @property string $id
 * @property string $document_form
 * @property integer $data_type
 * @property string $name
 * @property string $description
 */
class DocumentFormParams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document_form_params';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_form', 'data_type', 'name'], 'required'],
            [['document_form', 'data_type'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор параметра формы документа'),
            'document_form' => Yii::t('app', 'Идентификатор формы документа'),
            'data_type' => Yii::t('app', 'Идентификатор типа данных'),
            'name' => Yii::t('app', 'Наименование параметра формы'),
            'description' => Yii::t('app', 'Описание параметра формы'),
        ];
    }
}
