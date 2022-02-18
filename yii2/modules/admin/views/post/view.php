<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<?php
    //$username = app\modules\admin\models\User::find()->where(['id' => $model->author_id])->one();
    //$username = app\modules\admin\models\User::find()->select(['username'])->where(['id' => $model->author_id])->one();
    //$name = $username->username;

    $username = app\modules\admin\models\User::find()->asArray()->where(['id' => $model->author_id])->one();
    $category = app\modules\admin\models\PostCategory::find()->asArray()->where(['id' => $model->category_id])->one();
    // echo $username['username'];
    // echo '<pre>';
    // print_r($username);
    // echo '</pre>';
?>

<div class="post-view">

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
            'id',
            'title',
            [
                'attribute' => 'author_id',
                'value' => $username['username'],
                'format' => 'text',
            ],
            [
                'attribute' => 'category_id',
                'value' => $category['category'],
                'format' => 'text',
            ],
            'subtitle',
            //'imgage',
            [
                'attribute' => 'imgage',
                'value' => "/{$model->imgage}",
                'format' => ['image', ['width' => '100']],
            ],
            'body:html',
            [
                'attribute' => 'aviable',
                'value' => function($data){
                    return $data->aviable ? '<span class="text-green">Виден</span>' : '<span class="text-red">Черновик</span>';
                },
                'format' => 'raw',
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
