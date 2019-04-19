<?php

/* @var $this yii\web\View */
/* @var $model common\models\DataType */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Data Types',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="data-types-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
