<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class LogoutWidget extends Widget
{
    public function run(){
        return $this->render('logoutWidget');
    }
}