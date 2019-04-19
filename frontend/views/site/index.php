<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = '';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать</h1>

        <p class="lead">в систему документооборота кафедры информатики СмолГУ</p>
    </div>

    <div class="body-content">
		<center>
			<?= Html::a('Войти в систему', '/su/', ['class' => 'btn btn-lg btn-primary']) ?>
		</center>
    </div>
</div>
