<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data_types".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class DataType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор типа данных'),
            'name' => Yii::t('app', 'Наименование типа данных'),
            'description' => Yii::t('app', 'Краткое описание типа данных'),
        ];
    }
}
