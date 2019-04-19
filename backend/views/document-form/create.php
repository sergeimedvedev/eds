<?php


/* @var $this yii\web\View */
/* @var $model common\models\DocumentForm */

$this->title = Yii::t('app', 'Create Document Form');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-form-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
