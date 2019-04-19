<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Workspace */
/* @var $form yii\widgets\ActiveForm */

$this->title = '';
?>

<div class="workspace-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'document_type')->dropDownList($doctype, ['options' => ['selected' => array_keys($doctype)[0]]]) ?>

    <?= $form->field($model, 'registrator')->dropDownList($registrator, ['options' => ['selected' => array_keys($registrator)[0]]]) ?>

    <?= $form->field($model, 'reg_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]) ?>

    <?= $form->field($model, 'execution_date')->widget(DatePicker::className(), ['dateFormat' => 'yyyy-MM-dd', 'options' => ['class' => 'form-control']]) ?>

    <?= $form->field($model, 'reg_number')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'executor')->dropDownList($executors, ['prompt' => '- ' . Yii::t('app', 'Select an executor') . ' - ']) ?>

    <?php foreach ($params as $key => $param) { ?>
        <div class="form-group field-document-document_param_<?= $param->id ?>">
            <label class="control-label" for="document-document_param_<?= $param->id ?>"><?= $param->name ?></label>
            <?php if ($param->data_type === 1) { ?>
                <checkbox id="document-document_param_<?= $param->id ?>" class="form-control"
                          name="Params[<?= $param->id ?>]"></checkbox>
            <?php } ?>

            <?php if ($param->data_type === 2) { ?>
                <input type="number" id="document-document_param_<?= $param->id ?>" class="form-control"
                       name="Params[<?= $param->id ?>]" value="<?= $paramsValue[$param->id]['value'] ?>">
            <?php } ?>

            <?php if ($param->data_type === 3) { ?>
                <input type="number" id="document-document_param_<?= $param->id ?>" class="form-control"
                       name="Params[<?= $param->id ?>]" value="<?= $paramsValue[$param->id]['value'] ?>">
            <?php } ?>

            <?php if ($param->data_type === 4) { ?>
                <?= DatePicker::widget([
                    'dateFormat' => 'yyyy-MM-dd',
                    'value' => $paramsValue[$param->id]['value'],
                    'options' => [
                        'class' => 'form-control',
                        'id' => 'document-document_param_' . $param->id,
                        'name' => 'Params[' . $param->id . ']',

                    ],
                ]); ?>
            <?php } ?>

            <?php if ($param->data_type === 5) { ?>
                <input type="text" id="document-document_param_<?= $param->id ?>" class="form-control"
                       name="Params[<?= $param->id ?>]" value="<?= $paramsValue[$param->id]['value'] ?>">
            <?php } ?>

            <?php if ($param->data_type === 6) { ?>
                <br>
                <?= $paramsValue[$param->id]['value']
                /* <input type="file" id="document-document_param_<?= $param->id ?>" class="form-control" name="Params[<?= $param->id ?>]"> */
                ?>
            <?php } ?>

            <?php if ($param->description !== '') { ?>
                <div class="help-block"><?= $param->description ?></div>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Update'),
            [
                'class' => 'btn btn-primary js-add-new-doc-submit'
            ])
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
