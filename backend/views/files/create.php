<?php


/* @var $this yii\web\View */
/* @var $model common\models\Files */

$this->title = Yii::t('app', 'Create Files');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="files-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
