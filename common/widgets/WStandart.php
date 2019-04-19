<?php

namespace common\widgets;

use common\assets\WStandartAsset;

class WStandart extends _WModel
{

    public function init()
    {
        WStandartAsset::register($this->getView());
        parent::init();
    }
}
