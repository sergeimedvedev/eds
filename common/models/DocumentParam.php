<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document_param".
 *
 * @property string $id
 * @property string $document_form
 * @property string $document
 * @property string $value
 */
class DocumentParam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document_param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_form', 'document'], 'required'],
            [['id', 'document_form', 'document', 'param'], 'integer'],
            [['value'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор параметра формы документа'),
            'document_form' => Yii::t('app', 'Форма документа'),
            'document' => Yii::t('app', 'Документ'),
            'value' => Yii::t('app', 'Значение'),
        ];
    }
}
