<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workspace".
 *
 * @property string $id Идентификатор рабочей области
 * @property string $name Наименование рабочей области
 * @property string $description Описание рабочей области
 */
class Workspace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'workspace';
    }

    public static function getDocuments($id)
    {
        return Document::find()
            ->innerJoin('map', 'map.document = document.id')
            ->where(['map.workspace' => $id])
            ->orderBy('position')
            ->all();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['author'], 'integer'],
            [['ico'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор рабочей области'),
            'name' => Yii::t('app', 'Наименование рабочей области'),
            'description' => Yii::t('app', 'Описание рабочей области'),
            'ico' => Yii::t('app', 'Иконка'),
        ];
    }
}
