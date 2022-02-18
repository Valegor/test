<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\Gamers;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\GamersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Gamers');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gamers-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'format' => 'text',
                'label' => 'ID',
                'options' => ['width' => '35'],
            ],
            'name',
            'email:email',
            [
                'attribute' => 'score',
                'format' => 'text',
                'label' => 'Score',
                'options' => ['width' => '45'],
            ],
            // 'email_verified_at:email',
            // 'password',
            //'remember_token',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Gamers $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
            }
            ],
        ],
    ]); ?>


</div>
