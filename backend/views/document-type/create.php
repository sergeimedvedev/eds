<?php


/* @var $this yii\web\View */
/* @var $model common\models\DocumentTypes */

$this->title = Yii::t('app', 'Create Document Types');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Document Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-types-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
