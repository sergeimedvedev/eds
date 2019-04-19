<?php


/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', 'Create Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
