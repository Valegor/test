<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute' => 'created_at',
                'format' =>  ['date', 'dd.MM.YYYY'],
            ],
            [
                'attribute' => 'updated_at',
                'format' =>  ['date', 'dd.MM.YYYY'],
            ],
            [
                'attribute' => 'status',
                'value' => function($data){
                    // return $data->aviable ? '<span class="text-green">Виден</span>' : '<span class="text-red">Черновик</span>';
                    if($data->status == 0)  $html = '<span class="text-red">Новый</span>';
                    if($data->status == 1)  $html = '<span class="text-green">В работе</span>';
                    if($data->status == 2)  $html = '<span class="text-black">Завершен</span>';
                    return $html;
                },
                'format' => 'raw',
            ],
            'name',
            'email:email',
            'phone',
            'perfect_connect',
            'goals:ntext',
            'problem:ntext',
            'note:ntext',
            // 'game_id',
        ],
    ]) ?>

</div>
