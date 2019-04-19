<?php


/* @var $this yii\web\View */
/* @var $model common\models\Workspace */

$this->title = Yii::t('app', 'Create Workspace');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Workspaces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workspace-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
