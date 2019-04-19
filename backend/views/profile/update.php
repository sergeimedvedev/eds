<?php

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = Yii::t('app', '{nameAttribute}', [
    'nameAttribute' => $model->surname . ' ' . $model->name . ' ' . $model->patronymic,
]);
?>
<div class="profile-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
