<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property string $id
 * @property string $document_type
 * @property string $document_form
 * @property string $reg_date
 * @property string $reg_number
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_type', 'document_form', 'reg_date', 'reg_number'], 'required'],
            [['document_type', 'document_form', 'reg_number', 'registrator', 'executor'], 'integer'],
            [['reg_date'], 'safe'],
            [['execution_date'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'registrator' => Yii::t('app', 'Registrator'),
            'executor' => Yii::t('app', 'Executor'),
            'document_type' => Yii::t('app', 'Type'),
            'document_form' => Yii::t('app', 'Form'),
            'reg_date' => Yii::t('app', 'Registration Date'),
            'execution_date' => Yii::t('app', 'Execution Date'),
            'reg_number' => Yii::t('app', 'Registration Number'),
        ];
    }
}
