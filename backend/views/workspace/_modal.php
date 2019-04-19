<?php

use yii\bootstrap\Modal;

Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    'clientOptions' => [
        'keyboard' => true
    ]
]);
echo '<div id="modalContent"></div>';
Modal::end();
?>
