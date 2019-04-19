<?php

use common\models\DataType;
use common\models\DocumentForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DocumentFormParamsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Document Form Params');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-form-params-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Document Form Params'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'document_form',
                'filter' => $docforms,
                'value' => function ($model) {
                    return DocumentForm::findOne($model->document_form)->name;
                }
            ],
            [
                'attribute' => 'data_type',
                'filter' => $datatypes,
                'value' => function ($model) {
                    return DataType::findOne($model->data_type)->name;
                }
            ],
            'name',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
