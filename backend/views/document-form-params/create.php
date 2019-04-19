<?php


/* @var $this yii\web\View */
/* @var $model common\models\DocumentFormParams */

$this->title = Yii::t('app', 'Create Document Form Params');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Form Params'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-form-params-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
