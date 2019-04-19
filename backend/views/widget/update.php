<?php

/* @var $this yii\web\View */
/* @var $model common\models\Widget */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Widget',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Widgets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="widget-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
