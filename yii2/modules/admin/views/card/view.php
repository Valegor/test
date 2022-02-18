<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Card */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card-view">

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
            'code',
            'name',
            'category_id',
            'category',
            'img1',
            [
                'attribute' => 'img1',
                'value' => "/{$model->img1}",
                'format' => ['image', ['width' => '100']],
            ],
            'img2',
            [
                'attribute' => 'img2',
                'value' => "/{$model->img2}",
                'format' => ['image', ['width' => '100']],
            ],
            'backimg',
            [
                'attribute' => 'backimg',
                'value' => "/{$model->backimg}",
                'format' => ['image', ['width' => '100']],
            ],
            'notes:html',
        ],
    ]) ?>

</div>
