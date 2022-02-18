<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gamers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Gamers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php
    // $score_array = app\modules\admin\models\Score::find()->asArray()->where(['user_email' => $model->email])->one();
    // if(!$score_array){
    //     $score = 0;
    // } else {
    //     $score = $score_array['score'];
    // }
    // echo $score;
    // echo '<pre>';
    // print_r($username);
    // echo '</pre>';
?>

<div class="gamers-view">

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
            'email:email',
            'score',
            // [
            //     'attribute' => 'Score',
            //     'format' => 'text',
            //     'value' => $score
            // ]
            // 'email_verified_at:email',
            // 'password',
            // 'remember_token',
            // 'created_at',
            // 'updated_at',
        ],
    ]) ?>

</div>
