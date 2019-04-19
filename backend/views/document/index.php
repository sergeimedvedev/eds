<?php

use common\models\DocumentForm;
use common\models\DocumentType;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DocumentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Documents');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Document'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'document_type',
                'filter' => $doctypes,
                'value' => function ($model) {
                    return DocumentType::findOne($model->document_type)->name;
                }
            ],
            [
                'attribute' => 'document_form',
                'filter' => $docforms,
                'value' => function ($model) {
                    $form = DocumentForm::findOne($model->document_form);
                    return $form ? DocumentForm::findOne($model->document_form)->name : false;
                }
            ],
            [
                'attribute' => 'reg_date',
            ],
            'reg_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
