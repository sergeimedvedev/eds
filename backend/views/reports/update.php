<?php

/* @var $this yii\web\View */
/* @var $model common\models\Reports */

$this->title = Yii::t('app', '{nameAttribute}', [
    'nameAttribute' => $model->name,
]);
?>
<div class="reports-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
