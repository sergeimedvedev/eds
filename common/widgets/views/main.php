<?php

use yii\helpers\Html;

?>

<div class="v-control" data-parent="<?= $main['parent'] ?>" data-left="<?= $main['left'] ?>"
     data-top="<?= $main['top'] ?>" data-server="<?= $main['path'] ?>" data-cid="<?= $main['id'] ?>"
     style="<?php if ($main['width']) { ?> width: <?= $main['width'] ?>px;<?php } ?> height: <?= $main['height'] ?>px;"
     data-zindex="<?= $main['zindex'] ?>">
    <div class="box-body border-radius-none">
        <?= $this->render($path . '/view.php', $main) ?>
    </div>
</div>