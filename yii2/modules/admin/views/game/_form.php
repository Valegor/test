<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Game */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$categories = app\modules\admin\models\GameCategory::find()->all();
$data = yii\helpers\ArrayHelper::map($categories, 'id', 'category');
?>

<?php
$users = app\modules\admin\models\User::find()->all();
$datausers = yii\helpers\ArrayHelper::map($users, 'id', 'username');
// echo '<pre>';
// print_r($datausers);
// echo '</pre>';
?>

<?php
    
    $img = '';

    if (is_null($model->img) === true) 
        $img = 'cards/blank.jpg';
    else 
        $img = $model->img;

?>

<?php
$aviables = array
(
    '0' => 'Черновик',
    '1' => 'Опубликован'
)
?>

<div class="game-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author_id')->dropDownList($datausers) ?>

    <?= $form->field($model, 'category_id')->dropDownList($data) ?>

    <?= $form->field($model, 'subtitle')->textarea(['rows' => 12]) ?>

    <?php
        echo $form->field($model, 'notes')->widget(CKEditor::class, [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[/* Some    CKEditor Options */]),
        ]);
    ?>

    <?= $form->field($model, 'object')->textarea(['rows' => 12]) ?>

    <?php echo ' <hr> <b>Картинка 1: </b>' . $model->img . '<hr>' ?>

    <?= Html::img(Yii::$app->urlManager->createUrl($img)) ?>

    <?php
    echo $form->field($model, 'file')->widget(FileInput::class, [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showCaption' => false,
            'showUpload' => false,
        ],
    ]);
    ?>

    <?= $form->field($model, 'aviable')->dropDownList($aviables) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
