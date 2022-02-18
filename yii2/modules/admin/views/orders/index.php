<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'updated_at',
                'format' =>  ['date', 'dd.MM.YYYY'],
                'options' => ['width' => '190']
            ],
            'name',
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
            //'email:email',
            //'phone',
            //'perfect_connect',
            //'goals:ntext',
            //'problem:ntext',
            //'note:ntext',
            //'game_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
