<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\GameCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Game Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Game Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'format' => 'text',
                'label' => 'Cat_id',
                'options' => ['width' => '35'],
            ],
            'category',
            'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
