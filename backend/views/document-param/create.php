<?php


/* @var $this yii\web\View */
/* @var $model common\models\DocumentParam */

$this->title = Yii::t('app', 'Create Document Param');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Params'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-param-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
