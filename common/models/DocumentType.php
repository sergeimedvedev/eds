<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document_types".
 *
 * @property string $id
 * @property string $name
 * @property string $icon_class
 * @property string $description
 */
class DocumentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'icon_class', 'description'], 'required'],
            [['name', 'icon_class'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор типа документа'),
            'name' => Yii::t('app', 'Тип документа'),
            'icon_class' => Yii::t('app', 'Класс для отображения иконки типа документа'),
            'description' => Yii::t('app', 'Краткое описание типа документа'),
        ];
    }
}
