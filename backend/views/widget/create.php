<?php


/* @var $this yii\web\View */
/* @var $model common\models\Widget */

$this->title = Yii::t('app', 'Create Widget');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Widgets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="widget-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
