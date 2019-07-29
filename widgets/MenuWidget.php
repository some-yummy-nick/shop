<?php
/**
 * Created by PhpStorm.
 * User: Marat
 * Date: 29.07.2019
 * Time: 11:21
 */

namespace app\widgets;

use yii\base\Widget;

class MenuWidget extends Widget
{
    public $tpl;

    public function init()
    {
        parent::init();

        if ($this->tpl === null) {
            $this->tpl = "menu";
        }
        $this->tpl .= ".php";
    }

    public function run()
    {
        return $this->tpl;
    }
}
