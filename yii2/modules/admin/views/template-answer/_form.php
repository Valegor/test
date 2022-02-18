<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TemplateAnswer */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$templates = app\modules\admin\models\Templates::find()->all();
$data = yii\helpers\ArrayHelper::map($templates, 'id', 'name');
?>

<?php
$aviables = array
(
    '0' => 'Черновик',
    '1' => 'Опубликован'
)
?>

<div class="template-answer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'template_id')->dropDownList($data) ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'subtitle')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 7]) ?>

    <?= $form->field($model, 'author_id')->textInput() ?>

    <?= $form->field($model, 'author_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aviable')->dropDownList($aviables) ?>

    <?= $form->field($model, 'object')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
