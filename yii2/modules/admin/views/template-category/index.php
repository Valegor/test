<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\TemplateCategory;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TemplateCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Template Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Template Category'), ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'publishing',
                'value' => function($data){
                    return $data->publishing ? '<span class="text-green">Publish</span>' : '<span class="text-red">Hidden</span>';
                },
                'format' => 'raw',
            ],
            'img',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, TemplateCategory $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
