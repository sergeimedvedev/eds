<?php

use common\models\DocumentForm;
use common\models\DocumentType;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Document */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), '/su/workspace/public-update/?id=' . $model->id, ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'document_type',
                'value' => function ($model) {
                    return DocumentType::findOne($model->document_type)->name;
                }
            ],
            [
                'attribute' => 'document_form',
                'value' => function ($model) {
                    $form = DocumentForm::findOne($model->document_form);
                    return $form ? DocumentForm::findOne($model->document_form)->name : false;
                }
            ],
            'reg_date',
            'execution_date',
            'reg_number',
        ],
    ]) ?>

    <h2>Параметры:</h2>
    <?= DetailView::widget([
        'model' => $docParams,
        'attributes' => $docParams,
    ]) ?>
</div>
