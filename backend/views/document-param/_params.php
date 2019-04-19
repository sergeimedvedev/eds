<?php

use yii\jui\DatePicker;

?>

<?php foreach ($params as $key => $param) { ?>
    <div class="form-group field-document-document_param_<?= $param->id ?>">
        <label class="control-label" for="document-document_param_<?= $param->id ?>"><?= $param->name ?></label>
        <?php if ($param->data_type === 1) { ?>
            <checkbox id="document-document_param_<?= $param->id ?>" class="form-control"
                      name="Params[<?= $param->id ?>]"></checkbox>
        <?php } ?>

        <?php if ($param->data_type === 2) { ?>
            <input type="number" id="document-document_param_<?= $param->id ?>" class="form-control"
                   name="Params[<?= $param->id ?>]">
        <?php } ?>

        <?php if ($param->data_type === 3) { ?>
            <input type="number" id="document-document_param_<?= $param->id ?>" class="form-control"
                   name="Params[<?= $param->id ?>]">
        <?php } ?>

        <?php if ($param->data_type === 4) { ?>
            <?= DatePicker::widget([
                'dateFormat' => 'yyyy-MM-dd',
                'options' => [
                    'class' => 'form-control',
                    'id' => 'document-document_param_' . $param->id,
                    'name' => 'Params[' . $param->id . ']'
                ]
            ]); ?>
        <?php } ?>

        <?php if ($param->data_type === 5) { ?>
            <input type="text" id="document-document_param_<?= $param->id ?>" class="form-control"
                   name="Params[<?= $param->id ?>]">
        <?php } ?>

        <?php if ($param->data_type === 6) { ?>
            <input type="file" id="document-document_param_<?= $param->id ?>" class="form-control"
                   name="Params[<?= $param->id ?>]">
        <?php } ?>

        <?php if ($param->description !== '') { ?>
            <div class="help-block"><?= $param->description ?></div>
        <?php } ?>
    </div>
<?php } ?>