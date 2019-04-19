<?php

/* @var $this yii\web\View */
/* @var $model common\models\DocumentTypes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Document Types',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="document-types-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
