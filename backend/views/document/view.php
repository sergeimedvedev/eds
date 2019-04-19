<?php

use common\models\DocumentForm;
use common\models\DocumentType;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Document */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'document_type',
                'value' => function ($model) {
                    return DocumentType::findOne($model->document_type)->name;
                }
            ],
            [
                'attribute' => 'document_form',
                'value' => function ($model) {
                    return DocumentForm::findOne($model->document_form)->name;
                }
            ],
            'reg_date',
            'execution_date',
            'reg_number',
        ],
    ]) ?>

</div>
