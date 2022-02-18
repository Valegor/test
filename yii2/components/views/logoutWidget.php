<?php

use yii\helpers\Html;

 echo Html::a("Выход", ['/site/logout'], [
        'data' => [
            'method' => 'post'
        ],
        ['class' => 'white text-center']
    ]
);

