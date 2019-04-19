<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "widget".
 *
 * @property string $id
 * @property string $name
 * @property string $class
 *
 * @property DocumentForm[] $documentForms
 */
class Widget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'class'], 'required'],
            [['name', 'class'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор виджета'),
            'name' => Yii::t('app', 'Наименование виджета'),
            'class' => Yii::t('app', 'Название виджета'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentForms()
    {
        return $this->hasMany(DocumentForm::className(), ['widget' => 'id']);
    }
}
