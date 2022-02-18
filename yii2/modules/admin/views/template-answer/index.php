<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
Use app\modules\admin\models\TemplateAnswer;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TemplateAnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Template Answers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="template-answer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Template Answer'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'label' => 'ID',
                'options' => ['width' => '35'],
            ],
            'title',
            // [
            //     'attribute' => 'template_id',
            //     'format' => 'text',
            //     'label' => 'Cat_id',
            //     'options' => ['width' => '35'],
            // ],
            // [
            //     'attribute' => 'author_id',
            //     'format' => 'text',
            //     'label' => 'Author_id',
            //     'options' => ['width' => '35'],
            // ],
            [
                'attribute' => 'author_name',
                'format' => 'text',
                'label' => 'Author',
                'options' => ['width' => '150'],
            ],
            // 'author_email:email',
            // 'aviable',
            [
                'attribute' => 'aviable',
                'value' => function($data){
                    return $data->aviable ? '<span class="text-green">Виден</span>' : '<span class="text-red">Черновик</span>';
                },
                'options' => ['width' => '190'],
                'format' => 'raw',
            ],
            //'object:ntext',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, TemplateAnswer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
