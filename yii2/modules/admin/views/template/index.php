<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
Use app\modules\admin\models\Templates;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TemplatesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Templates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="templates-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Templates'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'name',
            [
                'attribute' => 'category',
                'format' => 'text',
                'label' => 'Category',
                'options' => ['width' => '210'],
            ],
            // 'author_id',
            // 'category_id',
            // 'subtitle:ntext',
            [
                'attribute' => 'aviable',
                'value' => function($data){
                    return $data->aviable ? '<span class="text-green">Виден</span>' : '<span class="text-red">Черновик</span>';
                },
                'format' => 'raw',
                'options' => ['width' => '65'],
            ],
            //'notes:ntext',
            //'object:ntext',
            //'img',
            //'aviable',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Templates $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
