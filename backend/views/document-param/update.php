<?php

/* @var $this yii\web\View */
/* @var $model common\models\DocumentParam */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Document Param',
    ]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Params'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="document-param-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
