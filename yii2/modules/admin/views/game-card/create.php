<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\GameCard */

$this->title = 'Create Game Card';
$this->params['breadcrumbs'][] = ['label' => 'Game Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
