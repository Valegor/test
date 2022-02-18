<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TemplateCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    
    $img = '';

    if (is_null($model->img) === true) 
        $img = 'cards/blank.jpg';
    else 
        $img = $model->img;

?>

<?php
$publishing = array
(
    '0' => 'Черновик',
    '1' => 'Опубликован'
)
?>

<div class="template-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'file')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showUpload' => false,
        ],
    ]);
    ?>

    <?= $form->field($model, 'publishing')->dropDownList($publishing) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
