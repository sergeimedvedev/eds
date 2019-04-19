<?php

use common\models\DocumentType;
use common\models\Widget;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DocumentFormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Document Forms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-form-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Document Form'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'widget',
                'filter' => $widgets,
                'value' => function ($model) {
                    return Widget::findOne($model->widget)->name;
                }
            ],
            'name',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
