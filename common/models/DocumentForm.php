<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document_form".
 *
 * @property string $id
 * @property string $document_type
 * @property string $widget
 * @property string $name
 * @property string $description
 *
 * @property Widget $widget0
 * @property DocumentType $documentType
 */
class DocumentForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document_form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_type', 'widget', 'name', 'description'], 'required'],
            [['document_type', 'widget'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 32],
            [['widget'], 'exist', 'skipOnError' => true, 'targetClass' => Widget::className(), 'targetAttribute' => ['widget' => 'id']],
            [['document_type'], 'exist', 'skipOnError' => true, 'targetClass' => DocumentType::className(), 'targetAttribute' => ['document_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Идентификатор формы документа'),
            'document_type' => Yii::t('app', 'Идентификатор типа документа'),
            'widget' => Yii::t('app', 'Идентификатор виджета, отвечающего за отображение формы'),
            'name' => Yii::t('app', 'Наименование формы'),
            'description' => Yii::t('app', 'Описание формы документа'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidget0()
    {
        return $this->hasOne(Widget::className(), ['id' => 'widget']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentType()
    {
        return $this->hasOne(DocumentType::className(), ['id' => 'document_type']);
    }
}
