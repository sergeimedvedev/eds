<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

?>

<div class="map-create">
    <div class="control-map-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <?= $form->field($model, 'document_type')->dropDownList($doctype, ['options' => ['selected' => array_keys($doctype)[0]]]) ?>

        <?= $form->field($model, 'registrator')->dropDownList($registrator, ['options' => ['selected' => array_keys($registrator)[0]]]) ?>

        <?= $form->field($model, 'reg_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]) ?>

        <?= $form->field($model, 'execution_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]) ?>

        <?= $form->field($model, 'reg_number')->textInput(['type' => 'number', 'value' => $newRegNumber]) ?>

        <?= $form->field($model, 'executor')->dropDownList($executors, ['prompt' => '- ' . Yii::t('app', 'Select an executor') . ' - ']) ?>

        <div class="form-group field-document-document_form required">
            <label class="control-label" for="document-document_form">Форма документа</label>
            <select id="document-document_form" class="form-control" name="Document[document_form]"
                    onchange="getDocumentParamsByForm($(this))" aria-required="true">
                <option value="">- Выберите форму документа -</option>
                <?php foreach ($forms as $value => $option) { ?>
                    <option value="<?= $value ?>"><?= $option ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Create'),
                [
                    'class' => 'btn btn-success js-add-new-doc-submit'
                ])
            ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
</div>