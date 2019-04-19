<?php


/* @var $this yii\web\View */
/* @var $model common\models\DataType */

$this->title = Yii::t('app', 'Create Data Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-types-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
