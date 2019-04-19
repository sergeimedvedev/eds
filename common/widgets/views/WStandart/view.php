<div class="w-standart" data-content="<?= $id ?>">
    <?php if (!empty($params)) { ?>
        <?= $params['Content'] ?>
        <?php foreach ($params as $key => $value) { ?>
            <p><?= $key ?> : <?= $value ?></p>
        <?php } ?>
    <?php } ?>
</div>