<?php

/* @var $this yii\web\View */
/* @var $model common\models\Files */

$this->title = Yii::t('app', 'Обновить: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Файлы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Обновить');
?>
<div class="files-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
