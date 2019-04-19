<?php

/* @var $this yii\web\View */
/* @var $model common\models\Workspace */

$this->title = Yii::t('app', 'Update Workspace: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workspaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="workspace-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
