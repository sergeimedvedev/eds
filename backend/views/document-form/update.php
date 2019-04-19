<?php

/* @var $this yii\web\View */
/* @var $model common\models\DocumentForm */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Document Form',
    ]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="document-form-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
