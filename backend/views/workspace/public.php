<?php

use backend\assets\AdminAsset;
use common\models\DocumentForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

AdminAsset::register($this);

$this->title = $model->name;
?>


    <div class="workspace-public">

        <button class="btn btn-success btn-large js-show-modal" value="../add-new/?id=<?= $model->id ?>"
                title="Зарегистрировать документ">
            <i class="fa fa-plus" aria-hidden="true"></i> Новый документ
        </button>

        <hr>

        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'reg_date',
                'execution_date',

                [
                    'attribute' => 'document_form',
                    'filter' => $docforms,
                    'value' => function ($model) {
                        $form = DocumentForm::findOne($model->document_form);
                        return $form ? DocumentForm::findOne($model->document_form)->name : false;
                    }
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '/su/workspace/public-view/?id=' . preg_replace("/[^0-9]/", '', $url), [
                                'title' => Yii::t('yii', 'View'),
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/su/workspace/public-update/?id=' . preg_replace("/[^0-9]/", '', $url), [
                                'title' => Yii::t('yii', 'Update'),
                            ]);
                        },
                    ]
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>

<?= $this->render('_modal') ?>