<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TemplateAnswer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Template Answers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$template = app\modules\admin\models\Templates::find()->asArray()->where(['id' => $model->template_id])->one();

?>
<div class="template-answer-view">

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
            'title',
            'subtitle:ntext',
            'notes:ntext',
            [
                'attribute' => 'category_id',
                'value' => $template['name'],
                'format' => 'text',
            ],
            'author_id',
            'author_name',
            'author_email:email',
            'aviable',
            'object:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
