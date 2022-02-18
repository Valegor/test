<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Templates */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="templates-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'author_id',
            'category',
            // 'category_id',
            'subtitle:ntext',
            'notes:ntext',
            [
                'attribute' => 'img',
                'value' => "/{$model->img}",
                'format' => ['image', ['width' => '100']],
            ],
            [
                'attribute' => 'aviable',
                'value' => function($data){
                    return $data->aviable ? '<span class="text-green">Виден</span>' : '<span class="text-red">Черновик</span>';
                },
                'format' => 'raw',
            ],
            'created_at',
            'updated_at',
            'object:ntext',
        ],
    ]) ?>

</div>
