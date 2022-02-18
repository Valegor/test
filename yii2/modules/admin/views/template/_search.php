<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TemplatesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="templates-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'author_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'subtitle') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'object') ?>

    <?php // echo $form->field($model, 'img') ?>

    <?php // echo $form->field($model, 'aviable') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
