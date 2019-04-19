<?php


/* @var $this yii\web\View */
/* @var $model common\models\Reports */

$this->title = Yii::t('app', 'Create Reports');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reports-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
