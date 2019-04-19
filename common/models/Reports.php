<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property string $id Идентификатор отчета
 * @property string $name Название отчета
 * @property string $query SQL-запрос на составление отчета
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'query'], 'required'],
            [['query'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор отчета'),
            'name' => Yii::t('app', 'Название отчета'),
            'query' => Yii::t('app', 'SQL-запрос на составление отчета'),
        ];
    }
}
